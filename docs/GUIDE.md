# OTS — Project Guide

Human reference for the omartahersaad.com codebase. Last full scan: 2026-10-16 (`master` @ `08cb3f7`).

AI agents: read [../AGENTS.md](../AGENTS.md) instead — same facts, denser, with rules.

## Contents

1. [What this is](#what-this-is)
2. [Stack](#stack)
3. [Repository map](#repository-map)
4. [Features](#features)
5. [Configuration](#configuration)
6. [Local development](#local-development)
7. [Testing](#testing)
8. [Deploy](#deploy)
9. [Runbooks](#runbooks)
10. [Known issues and tech debt](#known-issues-and-tech-debt)
11. [Branches](#branches)

---

## What this is

Personal site and freelancing landing page for Omar Taher Saad (backend engineer). One public page does most of the work: hero, about, LinkedIn work history, services, API integrations, projects, pricing packages, monthly retainers, and a contact form that emails the owner.

Older parts of the app (2019–2021) are still in the codebase: a physics-class registration form, a courses/appointments system with QR entrance cards and a helpdesk scanner, and user/admin dashboards. They are routed but not linked from the current landing page.

## Stack

| Layer | Tech |
|---|---|
| Backend | Laravel 12, PHP 8.4 (Composer platform pinned to `8.4.25`) |
| Frontend build | Vite 7, `laravel-vite-plugin`, Tailwind 4, Sass |
| Frontend runtime | Alpine 3 (landing), Bootstrap 5 + jQuery (legacy pages), Vue 3 (QR scanner only), tsParticles, Lenis, Motion |
| Database | MySQL in production; tests use the `phpunit.xml` settings |
| Mail | SMTP (Hostinger in production) |
| Hosting | Hostinger shared hosting, `~/public_html` |
| CI/CD | GitHub Actions → `deploy` branch → SSH → `deploy.sh` |

## Repository map

```
app/
  Http/Controllers/MainController.php   Landing page data, contact submit, media, legal pages
  Services/ContactFormGuard.php         Honeypot, form timestamp, URL count checks
  Services/RecaptchaVerifier.php        reCAPTCHA v3 score/action/hostname check
  Services/LinkedInExperienceService.php  Builds the experience section (export → cache → seed)
  Console/Commands/                     linkedin:sync-experience, skills:fetch-logos
  Console/Kernel.php, Application.php, LaravelAwareCommandLoader.php
                                        Workaround so package:discover works on Hostinger
  Mail/ContactForAdminMail.php          The only mail actually sent
  Models/, User.php, PhysicsSlot.php    Legacy courses / appointments / physics data
config/
  contact.php    Contact form limits and admin inbox
  linkedin.php   LinkedIn export paths, cache TTL, curated "enrichments"
  captcha.php    reCAPTCHA keys
  ots.php        Social media links
  app.php        landing_v2, landing_show_testimonials flags
resources/
  views/landing/home.blade.php          Current homepage (LANDING_V2=true)
  views/landing/partials/*.blade.php    One file per section
  views/components/landing/*            Blade components (card, modal, pricing-card…)
  views/home.blade.php                  Old homepage (LANDING_V2=false)
  js/landing.js, css/landing.css        Landing assets (Alpine + Tailwind)
  data/linkedin-profile.json            Bundled LinkedIn seed (fallback)
storage/app/skills.json                 Skills list shown on the site (tracked in git)
routes/web.php                          All web routes
routes/console.php                      Daily schedule: linkedin:sync-experience
deploy.sh                               Server-side deploy script (tracked on purpose)
.github/workflows/deployToProduction.yml
tests/                                  Contact form + reCAPTCHA tests
```

## Features

### Landing page

- Route `/` → `MainController::index`.
- `LANDING_V2=true` renders `landing.home`; `false` renders the old `home` view.
- Section content (services, projects, logos, packages, retainers, testimonials) is **hard-coded PHP arrays** inside `MainController::index`. Edit there to change copy or prices.
- Skills come from `storage/app/skills.json`.
- Testimonials section shows only when `LANDING_SHOW_TESTIMONIALS=true`.

### Contact form

Flow for `POST /contact` (throttled to 3 requests/minute per IP):

1. Validate fields (name, phone, email, subject, message, reCAPTCHA token).
2. Honeypot `company_url` filled → pretend success, send nothing.
3. Encrypted `form_ts` must be 3 s – 1 h old.
4. More than 2 URLs in subject + message → reject.
5. reCAPTCHA v3: score ≥ `RECAPTCHA_MIN_SCORE` (0.7), action `contact`, hostname matches `APP_URL`.
6. Queue `ContactForAdminMail` to `CONTACT_ADMIN_EMAIL`. No auto-reply to the sender.

Rules: never mail the submitter, never print `contact@omartahersaad.com` in HTML or Reply-To, never mention the old `otscommunity.com` domain. Spam that arrives at the mailbox directly (not via the form) cannot be fixed in this app.

### LinkedIn experience

Not scraped. Data source order:

1. LinkedIn data export (`Positions.json`, `Education.json`) from `LINKEDIN_EXPORT_DIR` or `storage/app/linkedin/export/`.
2. Cache file `storage/app/linkedin/experience.json` (gitignored).
3. Bundled seed `resources/data/linkedin-profile.json`.

Curated descriptions, tags, logos and locations live in `config/linkedin.php` → `enrichments`, keyed `company-slug|role-slug`. Exports often lack descriptions, so keep these when syncing. Company logos live in `storage/app/public/assets/images/companies/`.

### Other public pages

- `/privacy-policy`, `/terms-and-conditions`
- `/media-and-interviews` — TV and press links (hard-coded in `MainController::media`)
- `/freelancing/payment-methods`
- `/lang/{locale}` — switches `en` / `ar` (stored in session, applied by `Localization` middleware)

### Legacy systems (still routed)

- Physics classes: `/physics-classes/register`
- Courses and appointments: `/course`, `/appointment`, `/courses/...`, entrance card QR at `/appointment-entrance-card/{id}`
- Users: `/home`, `/users/{user}/...`
- Admin (`role:admin`): `/admin/users`, `/admin/dashboard`, `/admin/finalize-payments`
- Helpdesk (`role:training_academy_helpdesk`): QR entrance scanner (Vue 3 + `vue-qrcode-reader`)
- Auth: Laravel UI `Auth::routes()`

## Configuration

Copy `.env.example` to `.env`. Project-specific variables:

| Variable | Purpose | Default |
|---|---|---|
| `APP_URL` | Required by Vite build and reCAPTCHA hostname check | — |
| `LANDING_V2` | New landing page on/off | `false` in code, `true` in example |
| `LANDING_SHOW_TESTIMONIALS` | Show testimonials section | `false` |
| `CONTACT_ADMIN_EMAIL` | Inbox for contact form mail | `ots.for.work@gmail.com` |
| `MAIL_FROM_ADDRESS` | Sender address | `no-reply@omartahersaad.com` |
| `RECAPTCHA_SITE_KEY`, `RECAPTCHA_SECRET_KEY` | reCAPTCHA v3 keys (not in `.env.example`) | — |
| `RECAPTCHA_MIN_SCORE` | Minimum v3 score | `0.7` |
| `CONTACT_MIN_FILL_SECONDS`, `CONTACT_MAX_FILL_SECONDS`, `CONTACT_MAX_URLS` | Guard limits | `3`, `3600`, `2` |
| `LINKEDIN_PROFILE_URL` | Profile link | omartahersaad |
| `LINKEDIN_EXPORT_DIR` | Path to an extracted LinkedIn export | unset |
| `LINKEDIN_CACHE_TTL` | Cache lifetime, seconds | `86400` |
| `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_SCHEME` | SMTP | `log` mailer if unset |

`MAIL_DRIVER` is still read as a fallback for old `.env` files.

## Local development

```bash
composer install
npm ci
cp .env.example .env && php artisan key:generate
php artisan migrate
npm run dev        # or: npm run build
php artisan serve
```

Notes:

- `npm ci` needs `fs-extra` (direct devDependency) because `@tsparticles/engine`'s install script imports it.
- `package.json` `overrides` pin patched versions of transitive packages for CVEs. Keep them.
- Composer resolves as if PHP were 8.4.25 to match Hostinger. Bump `config.platform.php` only together with the server PHP.

## Testing

```bash
php artisan test
```

Status at last scan: 11 tests, 30 assertions, all passing. Coverage is the contact form (`ContactSubmitTest`, `ContactFormGuardTest`) and `RecaptchaVerifierTest`. Nothing covers the landing page data, LinkedIn service, or legacy systems.

## Deploy

Trigger: push to `master` (or run the workflow manually with a `source_branch`).

1. **Build job** (GitHub Actions, Node 20): `npm ci`, `npm run build` with a throwaway `.env`, then force-push branch `deploy` with `public/build` committed.
2. **Deploy job**: SSH to Hostinger (`SSH_HOST`, `SSH_USERNAME`, `SSH_KEY`, `SSH_PORT` secrets), `cd ~/public_html`, check out `deploy.sh` from `origin/deploy`, run it.
3. **`deploy.sh`** on the server:
   - picks a PHP ≥ 8.4 binary (non-interactive SSH may default to an older one)
   - `artisan down` → `git reset --hard origin/deploy` (keeps `.env`)
   - fails if `public/build` is empty
   - `composer install --no-dev --no-scripts`, then `package:discover`, `optimize`, `migrate --force`, `queue:restart`
   - `linkedin:sync-experience --force` (warns, does not fail)
   - opcache reset via a one-time PHP file, `artisan up`, health check on `APP_URL`

Deploys are queued (`concurrency: production`), never cancelled mid-run. If `deploy.sh` aborts, its trap runs `artisan up`.

Never commit `.env`, `public/hot`, `.cursor/mcp.json`, or `.mcp.json`.

## Runbooks

**Update work experience**

1. Request a LinkedIn data export (Settings → Data Privacy → Get a copy of your data).
2. Copy `Positions.json` (and `Education.json`) to `storage/app/linkedin/export/`, or set `LINKEDIN_EXPORT_DIR`.
3. Run `php artisan linkedin:sync-experience --force`.
4. Add or edit curated blurbs in `config/linkedin.php` → `enrichments`.

**Change prices, services, or projects**

Edit the arrays in `MainController::index` (`$services`, `$projects`, `$packages`, `$retainers`, `$logos`, `$testimonials`).

**Add a skill**

Add it to `storage/app/skills.json`, then `php artisan skills:fetch-logos` to download its logo.

**Contact form mail not arriving**

1. Check `storage/logs/laravel.log` for `Contact form submission`.
2. Check `MAIL_MAILER` is `smtp` (an unset mailer falls back to `log`).
3. Check reCAPTCHA keys and that `APP_URL` host matches the live domain.

## Known issues and tech debt

Found during the 2026-10-16 scan. None block the live landing page.

1. `php artisan route:list` crashes: `PhysicsSlotController::__construct` reads `storage/app/physics-data.json`, which does not exist. Any request to `/physics-classes/*` fails the same way.
2. Routes `login/{provider}` and `login/{provider}/callback` point to `LoginController` methods that do not exist, and Socialite is not installed.
3. Role `training_academy_helpdesk` is used in `routes/web.php` but missing from `User::$roles`.
4. `ContactMail` and `SendContactMailsJob` are unused (old auto-reply flow).
5. `config/twill.php`, `config/twill-navigation.php` and `config/translatable.php` belong to packages that are not installed.
6. `RECAPTCHA_SITE_KEY` / `RECAPTCHA_SECRET_KEY` are missing from `.env.example`.

## Branches

- `master` — production source.
- `deploy` — CI output (source + built assets). Do not commit to it by hand.
- `feature/landing-v2-vibrant-redesign` — older landing work, not merged, not production.
- Other remote branches (`cursor/*`, `feature/*`, `dx/cleanup-codebase`, …) are experiments; check before relying on them.
