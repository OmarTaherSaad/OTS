# AGENTS.md — OTS (omartahersaad.com)

Canonical context for AI coding agents. Human version: `docs/GUIDE.md`. Session history + open items: `docs/AI-SESSIONS.md` (read it when picking up work). Last verified 2026-10-16 against `master` @ `08cb3f7`.

## Scope

- Repo `OmarTaherSaad/OTS`. Personal site + freelancing landing page. Live: https://omartahersaad.com/. Owner: Omar Taher Saad.
- This repo is the website only. No Tauri app, no `tools/ots-assistant/`. Do not apply "build for desktop + mobile" rules here. The separate product lives in `OmarTaherSaad/lots`.

## Stack facts

- Laravel 12 (12.69.x), PHP 8.4. `composer.json` `config.platform.php` = `8.4.25` to match Hostinger. Bump both together or not at all.
- Vite 7 + `laravel-vite-plugin` + Tailwind 4 + Sass. Landing uses Alpine 3; legacy pages use Bootstrap 5 + jQuery; Vue 3 only for the helpdesk QR scanner.
- `vite.config.js` reads `APP_URL` from `.env` and `process.exit(1)` if missing.
- `fs-extra` is a direct devDependency because `@tsparticles/engine` install script imports it. Removing it breaks `npm ci`.
- `package.json` `overrides` pin CVE-patched transitive deps. Do not remove.
- `bootstrap/app.php` binds custom `App\Console\Kernel` → `App\Console\Application` → `LaravelAwareCommandLoader`. Fixes `make() on null` during `package:discover` on Hostinger. Keep.

## Where things live

| Need | File |
|---|---|
| Homepage data (services, projects, logos, packages, retainers, testimonials) | `app/Http/Controllers/MainController.php::index` — hard-coded arrays |
| Homepage view switch | `config('app.landing_v2')` (`LANDING_V2`) → `landing.home` else `home` |
| Landing sections | `resources/views/landing/partials/*.blade.php`; components in `resources/views/components/landing/` |
| Landing JS/CSS | `resources/js/landing.js`, `resources/css/landing.css` |
| Skills | `storage/app/skills.json` (tracked) |
| Contact submit | `MainController::SubmitContact`, `app/Services/ContactFormGuard.php`, `app/Services/RecaptchaVerifier.php`, `app/Mail/ContactForAdminMail.php`, `config/contact.php`, `config/captcha.php` |
| Contact form partials | `resources/views/partials/contact-guard-fields.blade.php`, `contact-recaptcha-script.blade.php`, `resources/views/landing/partials/contact.blade.php` |
| LinkedIn experience | `app/Services/LinkedInExperienceService.php`, `config/linkedin.php`, `app/Console/Commands/SyncLinkedInExperience.php` |
| Routes | `routes/web.php` (all); `routes/console.php` (daily `linkedin:sync-experience`) |
| Deploy | `.github/workflows/deployToProduction.yml`, `deploy.sh` |
| Translations | `lang/en`, `lang/ar`, `lang/ar.json`; `Localization` middleware reads `session('applocale')` |

## Contact form invariants

Flow: validate → honeypot `company_url` (fake success) → encrypted `form_ts` age 3 s–1 h → max 2 URLs → reCAPTCHA v3 (score ≥ `contact.recaptcha_min_score`, action `contact`, hostname = `APP_URL` host) → queue `ContactForAdminMail` to `config('contact.admin_email')`. Route throttled `throttle:3,1`.

- Mail admin only. Never mail `$request->input('email')` (open relay). No auto-reply.
- Never hard-code an inbox; use `config('contact.admin_email')`.
- Never print `contact@omartahersaad.com` in HTML or Reply-To. Never mention `otscommunity.com`.
- Mailbox spam not sent through the form is out of scope for this app.
- Detail rule: `.cursor/rules/contact-form-spam.mdc`.

```php
// valid
Mail::to(config('contact.admin_email'))->queue(new ContactForAdminMail(...));
// invalid
Mail::to($request->input('email'))->send(...);
```

## LinkedIn invariants

- No scraping, no Apify (removed). Source: official LinkedIn export `Positions.json` / `Education.json` from `LINKEDIN_EXPORT_DIR` or `storage/app/linkedin/export/`.
- Fallback chain: export → cache `storage/app/linkedin/experience.json` (gitignored) → seed `resources/data/linkedin-profile.json`.
- Curated copy in `config/linkedin.php` `enrichments`, key `{company-slug}|{role-slug}`. Never delete on sync.
- Sync: `php artisan linkedin:sync-experience [--force]`. Runs daily via scheduler and on every deploy (non-fatal).

## Deploy pipeline

1. Push `master` → Actions build job: `npm ci`, `npm run build`, force-push branch `deploy` with `public/build`.
2. Deploy job: SSH Hostinger → `cd ~/public_html` → checkout `deploy.sh` from `origin/deploy` → run it.
3. `deploy.sh`: pick PHP ≥ 8.4 → `artisan down` → `git reset --hard origin/deploy` (preserves `.env`) → assert `public/build` non-empty → `composer install --no-dev --no-scripts` → `package:discover` → `optimize` → `migrate --force` → `queue:restart` → LinkedIn sync → opcache reset → `artisan up` → health check.

- `deploy.sh` is tracked on purpose (was gitignored once). Keep it tracked.
- Never hand-commit to `deploy`.
- Pushing to `master` deploys to production. Do not push unless the user asks.

## Commands

```bash
php artisan test                               # 11 tests, all passing at last scan
npm run build                                  # needs APP_URL in .env
php artisan linkedin:sync-experience --force
php artisan skills:fetch-logos [--force] [--update-existing]
```

## Secrets — never commit, never echo

- `.env`
- `.cursor/mcp.json` and root `.mcp.json` — hold the Hostinger email MCP bearer token. Both gitignored. Never paste the token into a rule, commit, doc, or chat.
- `public/hot`

## Known broken / dead code (do not "fix" unasked; mention if relevant)

1. `PhysicsSlotController::__construct` reads missing `storage/app/physics-data.json` → `/physics-classes/*` and `php artisan route:list` crash.
2. `login/{provider}` routes → `LoginController` methods missing; Socialite not installed.
3. Role `training_academy_helpdesk` used in routes, absent from `User::$roles`.
4. `ContactMail`, `SendContactMailsJob` unused.
5. `config/twill*.php`, `config/translatable.php` for uninstalled packages.
6. `.env.example` lacks `RECAPTCHA_SITE_KEY` / `RECAPTCHA_SECRET_KEY`.

## Legacy areas (routed, unlinked from landing)

Physics classes, courses/appointments (QR entrance cards), user dashboards, `role:admin` panel, `role:training_academy_helpdesk` scanner, Laravel UI auth. Models: `app/User.php`, `app/PhysicsSlot.php`, `app/Models/{Appointment,AppointmentUser,Course,Skill}.php`.

## Branches

- `master` = production source. `deploy` = CI artifact.
- `feature/landing-v2-vibrant-redesign` is unmerged older work, not production.

## Working rules

- Do not commit unless the user asks.
- New repeatable pattern or constraint → add `.cursor/rules/<name>.mdc` (frontmatter `description` + `globs`; sections Use Cases, Constraints, Valid Examples, Invalid Examples) and update this file.
- When facts here change (deploy, stack, invariants), update this file and `docs/GUIDE.md` in the same change.
- At end of a session with meaningful work, append a short entry to `docs/AI-SESSIONS.md` and update its Open items. Never commit raw transcripts (public repo, secrets).
