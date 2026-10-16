# OTS

Personal website of Omar Taher Saad — live at <https://omartahersaad.com/>.

Laravel 12 site with a single-page landing (about, LinkedIn experience, services, projects, pricing, contact form), plus legal pages, a media page, and a legacy courses/appointments system that is still routed but no longer linked from the landing page.

- Full human guide: [docs/GUIDE.md](docs/GUIDE.md)
- AI agent context: [AGENTS.md](AGENTS.md) (Claude Code reads it via [CLAUDE.md](CLAUDE.md); Cursor via `.cursor/rules/`)

## Quick start

Requires PHP 8.4, Composer 2, Node 20, MySQL (or SQLite for a quick look).

```bash
composer install
npm ci
cp .env.example .env && php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

Open <http://localhost:8000>. `APP_URL` in `.env` must be set — `vite.config.js` reads it and exits if missing.

## Common tasks

| Task | Command |
|---|---|
| Run tests | `php artisan test` |
| Watch frontend | `npm run dev` |
| Production asset build | `npm run build` |
| Refresh LinkedIn experience | `php artisan linkedin:sync-experience --force` |
| Fetch missing skill logos | `php artisan skills:fetch-logos` |

## Deploy

Push to `master`. GitHub Actions builds assets, force-pushes branch `deploy`, then SSHes into Hostinger and runs [deploy.sh](deploy.sh). Details: [docs/GUIDE.md#deploy](docs/GUIDE.md#deploy).

## License

GNU GPL — see [LICENSE.md](LICENSE.md). Security reports: [SECURITY.md](SECURITY.md).
