# AI session log (handoff)

Distilled record of every Claude Code session on this repo, so the next agent or person can continue.
Raw transcripts are **not** committed: this repo is public and they contain secrets (tokens, headers, server details).
They stay local at `~/.claude/projects/-Users-ots-Documents-Projects-Personal-OTS/*.jsonl`.

Read `AGENTS.md` first for stable facts. This file covers history and open items.

Last updated: 2026-11-05.

## Open items (start here)

1. **Prod queue.** `jobs` table had ~3.7K rows on 2026-10-05: contact mails are queued (`ShouldQueue`) and prod likely has `QUEUE_CONNECTION=database` with no worker. Recommended fix: set `QUEUE_CONNECTION=sync` in prod `.env`, then `php artisan config:cache`. Alternative: cron `queue:work --stop-when-empty --max-time=50`. Clear stale backlog first or the inbox gets flooded. Unconfirmed whether done.
2. **Contact form end-to-end test.** After the mail config fix (`08cb3f7`) and SPF/DMARC tightening, nobody confirmed a live form submission reaches the admin inbox (not spam). Prod `.env` needs real Hostinger SMTP values (`MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_PORT`, `MAIL_FROM_ADDRESS` on the domain).
3. **DMARC `p=reject`.** DMARC set to `p=quarantine` on 2026-10-03. After ~2 weeks of clean Cloudflare DMARC reports, move to `p=reject`. Due.
4. **Cloudflare leftovers.** Confirm "Block AI bots" toggle is on. `hub.omartahersaad.com` is an unproxied A record exposing an origin IP: delete or proxy if unused. `autoconfig`/`autodiscover` still proxied (only breaks mail-client autosetup).
5. **Composer platform pin.** `composer.json` pins `8.4.25`; server PHP is `8.4.19`. Lower pin to `8.4.19` if a package ever needs > 8.4.19 and the server install fails.
6. Dependabot moderate alert flagged 2026-10-04 (`/security/dependabot/225`), not reviewed.
7. Commit `843f6e4` (docs) is local-only, not pushed. Pushing `master` deploys.

## Sessions

### 2026-10-03 — Spam / scraping protection (DNS + Cloudflare)
- App form already hardened (throttle, reCAPTCHA v3, honeypot, timed token).
- DKIM failing: Hostinger DKIM CNAMEs (`hostingermail-{a,b,c}._domainkey`) were **proxied** in Cloudflare → `dkim=permerror`. Fixed by setting them DNS-only (grey cloud). Gmail then showed `dkim=pass`.
- SPF changed `~all` → `-all`; DMARC `p=none` → `p=quarantine` (Cloudflare DMARC reporting `rua`). DNS lives on Cloudflare; mail on Hostinger.
- Cloudflare: Bot Fight Mode on; rate-limit rule on `POST /contact` (free plan: 3 req / 10 s, block 10 s). Laravel `throttle:3,1` is the real limiter.
- `public/robots.txt` now disallows AI crawlers (`b776574`). Note: Hostinger CDN (`x-hcdn-cache-status`) caches static files independently of Cloudflare; Cloudflare purge alone does not clear it.
- WHOIS already redacted (registrar Cloudflare).

### 2026-10-04 — PHP 8.4 upgrade
- Hostinger switched to PHP 8.4; `composer.json` `config.platform.php` 8.2.33 → 8.4.25 (`ce72321`). 11 tests pass.
- Server deploy failed: Hostinger PHP 8.4 CLI disables `proc_open` via a generated `/opt/alt/php84/link/conf/alt_php.ini` (not shown in hPanel). Only Composer's `post-autoload-dump` script needed it.
- Fix (`c2ed6a2`): `deploy.sh` runs `composer install --no-scripts`, then `artisan package:discover` separately. No security override.

### 2026-10-04 — Pipeline deploy picks wrong PHP
- GitHub Actions runs `deploy.sh` over non-interactive SSH → default older PHP → composer platform check fails.
- Fix (`db52f49`): `deploy.sh` searches for a PHP ≥ 8.4 binary (`/opt/alt/php84/usr/bin/php` confirmed) and runs composer with it.

### 2026-10-04 — Phone input flags (landing contact form)
- Flag overlapped number: Bootstrap `.px-4 !important` beat intl-tel-input padding. Fix in `resources/css/landing.css`: `.landing .iti input[type="tel"] { padding-left: 52px !important }` (`360be26`).
- Desktop flags blurred: dropdown rendered inside form with `backdrop-filter` + transformed `.reveal` parent. Fix in `resources/js/app.js`: `dropdownContainer: document.body` (`897cfe7`). Dropdown now uses default white list on desktop too.
- Local dev gotcha: stale `public/hot` points to a stopped Vite server → unstyled page. Run `npm run dev` or delete `public/hot`.

### 2026-10-04 — Contact form not sending
- `config/mail.php` was Laravel 5 style; Laravel 12 reads `mail.default` → fell back to `log`. Rewritten for Laravel 12: `MAIL_MAILER` selects mailer, `MAIL_DRIVER` kept as fallback so old prod `.env` works (`08cb3f7`, pushed).

### 2026-10-05 — Scheduler / jobs table
- `schedule:run` saying "No scheduled commands are ready" is normal: only `linkedin:sync-experience` daily at 00:00. Check with `php artisan schedule:list`.
- Hostinger cron should use the 8.4 binary: `* * * * * cd ~/public_html && /usr/bin/php8.4 artisan schedule:run >> /dev/null 2>&1`.
- `jobs` backlog: see open item 1. `jobs.created_at` is a unix int; prune with `DB::table('jobs')->where('created_at','<', now()->subYear()->timestamp)->delete()` (preview with `->count()` first).

### 2026-10-16 — Docs
- Added `AGENTS.md` (AI context), `docs/GUIDE.md` (human guide), refreshed `README.md`, `CLAUDE.md` → `@AGENTS.md` (`843f6e4`, not pushed).

### 2026-11-05 — This handoff
- Added this file, committed `.claude/rules/` (shared Claude rules). `.claude/settings.local.json` stays local (gitignored).
- Claude memory dir for this project was empty; nothing else to export.
