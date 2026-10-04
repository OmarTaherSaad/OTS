#!/usr/bin/env bash
# Production deploy for Hostinger and GitHub Actions SSH.
# Resets to origin/deploy, installs PHP deps, caches, migrates, health-checks.
set -euo pipefail
cd "$(dirname "$0")"

if [ -z "${NO_COLOR:-}" ]; then
  G=$'\033[38;2;52;211;153m'; C=$'\033[38;2;125;211;252m'
  Y=$'\033[38;2;251;191;36m'; R=$'\033[38;2;251;113;133m'
  M=$'\033[38;2;196;181;253m'; D=$'\033[2m'; B=$'\033[1m'; N=$'\033[0m'
else
  G=; C=; Y=; R=; M=; D=; B=; N=
fi

T0=$(date +%s)
n=0
php_bin=${PHP_BIN:-php}
# Non-interactive SSH skips the shell profile, so `php` can be an older default. Pick a PHP >= 8.4.
php_ok() { "$1" -r 'exit(PHP_VERSION_ID >= 80400 ? 0 : 1);' >/dev/null 2>&1; }
if ! php_ok "$php_bin"; then
  for c in /opt/alt/php84/usr/bin/php /usr/local/bin/php84 /usr/bin/php8.4 "$HOME/bin/php"; do
    if [ -x "$c" ] && php_ok "$c"; then php_bin=$c; break; fi
  done
fi
export PATH="$(dirname "$(command -v "$php_bin")"):$PATH"
LOG=$(mktemp)

elapsed() { echo "$(($(date +%s) - T0))s"; }
now_utc() { date -u '+%Y-%m-%d %H:%M UTC'; }
loadavg() { awk '{print $1}' /proc/loadavg 2>/dev/null || echo '?'; }
php_ver() { "$php_bin" -r 'echo PHP_MAJOR_VERSION.".".PHP_MINOR_VERSION.".".PHP_RELEASE_VERSION;' 2>/dev/null || echo '?'; }

say()  { printf '%b\n' "$*"; }
ok()   { say "  ${G}✓${N}  $*"; }
warn() { say "  ${Y}!${N}  $*"; }
die()  { say "  ${R}✗${N}  $*"; exit 1; }

step() {
  n=$((n + 1))
  local label=$1; shift
  local s=$(date +%s)
  if "$@" >"$LOG" 2>&1; then
    printf '  %s✓%s  %-22s  %s%4ss%s\n' "$G" "$N" "$label" "$D" "$(($(date +%s) - s))" "$N"
  else
    local rc=$?
    printf '  %s✗%s  %-22s  %s%4ss%s\n' "$R" "$N" "$label" "$D" "$(($(date +%s) - s))" "$N"
    cat "$LOG"
    return "$rc"
  fi
}

on_abort() {
  printf '\n  %s! abort — artisan up%s\n' "$Y" "$N"
  "$php_bin" artisan up >/dev/null 2>&1 || true
  rm -f "$LOG"
}

composer_bin() {
  if command -v composer2 >/dev/null 2>&1; then
    echo composer2
  elif command -v composer >/dev/null 2>&1; then
    echo composer
  else
    die "composer not found"
  fi
}

read_app_url() {
  grep -E '^APP_URL=' .env | head -1 | cut -d= -f2- | tr -d '"' | tr -d "'" | sed 's:/*$::'
}

opcache_reset() {
  local url=$1 token file body
  token=$(openssl rand -hex 16)
  file="public/__opcache_reset_${token}.php"
  printf '%s\n' '<?php' 'if (function_exists("opcache_reset")) { opcache_reset(); echo "OPCACHE_RESET_OK"; } else { echo "OPCACHE_NOT_ENABLED"; }' > "$file"
  body=$(curl -fsSk --max-time 20 "${url}/__opcache_reset_${token}.php" || true)
  rm -f "$file"
  case "$body" in
    *OPCACHE_RESET_OK*) ok "opcache" ;;
    *OPCACHE_NOT_ENABLED*) warn "opcache off" ;;
    *) warn "opcache ping failed" ;;
  esac
}

health() {
  local url=$1 code
  code=$(curl -sS -o /dev/null -w '%{http_code}' --max-time 20 -k "$url" || echo 000)
  case "$code" in
    2*|3*) ok "health ${code}  ${url}" ;;
    503) die "health 503 — still down?" ;;
    000) warn "health unreachable from this host  ${url}" ;;
    *) warn "health ${code}  ${url}" ;;
  esac
}

say ""
say "${M}╭${N} ${B}OTS${N} ${C}deploy${N}  ${D}$(now_utc)${N}"
say "${M}│${N}  php ${C}$(php_ver)${N}   load ${Y}$(loadavg)${N}   disk ${D}$(git rev-parse --short=12 HEAD 2>/dev/null || echo none)${N}"
say "${M}╰${N}"

PREV=$(git rev-parse --short=12 HEAD 2>/dev/null || echo none)
trap on_abort EXIT

step "maintenance"  "$php_bin" artisan down --retry=60 --refresh=15 --quiet --no-ansi
step "git fetch"    git fetch origin --prune
[ -f .env ] && cp .env .env.backup
step "git reset"    git reset --hard origin/deploy
[ -f .env.backup ] && mv .env.backup .env
[ -f .env ] || die "missing .env after reset"

NEW=$(git rev-parse --short=12 HEAD)
SUBJ=$(git log -1 --pretty=format:'%s')
say "  ${D}──${N}  ${PREV} ${C}→${N} ${G}${NEW}${N}"
say "  ${D}    ${SUBJ}${N}"
[ -d public/build ] && [ -n "$(ls -A public/build)" ] || die "public/build empty — CI build did not land"

export COMPOSER_HOME="${COMPOSER_HOME:-$HOME/.config/composer}"
COMP=$(composer_bin)
step "composer"     "$php_bin" "$(command -v "$COMP")" install --no-interaction --prefer-dist --optimize-autoloader --no-dev --no-progress --no-scripts
step "discover"     "$php_bin" artisan package:discover --ansi --quiet
step "optimize"     bash -c "$php_bin artisan optimize:clear --quiet --no-ansi && $php_bin artisan optimize --quiet --no-ansi"
step "migrate"      "$php_bin" artisan migrate --force --no-ansi --quiet
step "queue"        "$php_bin" artisan queue:restart --quiet --no-ansi

if "$php_bin" artisan linkedin:sync-experience --force --quiet --no-ansi; then
  ok "linkedin"
else
  warn "linkedin skipped — bundled profile"
fi

APP_URL=$(read_app_url || true)
if [ -n "${APP_URL:-}" ]; then
  opcache_reset "$APP_URL"
else
  warn "no APP_URL — skip opcache"
fi

step "go live"      "$php_bin" artisan up --quiet --no-ansi
trap 'rm -f "$LOG"' EXIT

[ -n "${APP_URL:-}" ] && health "$APP_URL"

say "${M}╭${N} ${G}${B}live${N}  ${PREV} ${D}→${N} ${NEW}  ${D}$(elapsed)${N}"
say "${M}╰${N}"
say ""
