# iCARE Integrated Case Management System

iCARE is a BS Information Technology capstone project for the Office of Student Services (OSS) at Benguet State University. The web application helps staff coordinate student referrals, appointments, and case follow-ups across the Guidance and Counseling Unit (GCU), Student Discipline Unit (SDU), and Testing and Materials Development Unit (TMDU).

## Capstone objectives

1. Design and develop an integrated case management system for the three OSS units.
2. Evaluate the system's usability and learnability using the System Usability Scale (SUS).

## Project scope

| Participants | Workflows |
| --- | --- |
| GCU | Manage guidance and counseling referrals, schedule sessions, and track follow-ups. |
| SDU | Record student complaints and disciplinary cases, and refer students to GCU for support when appropriate. |
| TMDU | Receive testing referrals, schedule testing appointments, and record testing workflow updates. |
| Faculty, department chairs, deans, and students | Submit referrals or access records and services according to assigned permissions. |
| OSS Director | Review oversight information within the role's assigned permissions. |

The project also covers student record management, case status monitoring, and administrative functions such as audit logs and backups. University personnel retain responsibility for counseling, psychological assessments, disciplinary decisions, and any actions arising from them. Local demonstrations should use fictional student records.

## Implementation

The defended manuscript describes the original Laravel implementation. This repository contains the separate CodeIgniter 4 conversion with the Vue 3 frontend. CodeIgniter handles HTTP bootstrapping, routes, access filters, migrations, and Spark commands. Standalone Illuminate components support Eloquent, validation, mail, notifications, and related services.

- [Original Laravel repository](https://github.com/Damaso-Web/icare)
- [Conversion and database migration notes](docs/MIGRATION.md)
- [Recorded conversion validation](docs/VALIDATION.md)
- [User manual](docs/iCARE_User_Manual.md)

The conversion was validated against an earlier source snapshot in November 2026. Later changes in the Laravel repository require a separate review before they can be carried over.

## Capstone team

Asher Eve D. Ambaked, Adrian Mark O. Nabua, Sean Genry G. Agbuya, Dharlin Dane S. Asuncion, and Kayfer John A. Balegan.

*College of Information Sciences, Benguet State University · November 2026*

## Requirements

- PHP 8.3 or newer within PHP 8.x; PHP 8.3 was tested.
- Composer 2 and MySQL/MariaDB for your normal installation. SQLite is also supported for tests/local evaluation.
- PHP extensions: intl, mbstring, PDO, pdo_mysql, mysqli, DOM/XML, GD, fileinfo, zip, openssl, curl. For tests, enable pdo_sqlite and sqlite3 too.
- Node.js 24 and npm if rebuilding/editing the Vue frontend. A compiled frontend is included, so Node is optional for the first local run.
- Laragon, XAMPP with a suitable PHP version, Apache/Nginx, or the built-in `php spark serve` server. The web root must be `public/`.

## New local installation (Windows / Laragon)

1. Extract this folder, for example to `C:\laragon\www\icare-codeigniter`.
2. Open a terminal in the project folder and run:

   ```powershell
   composer install
   Copy-Item .env.example .env
   ```

3. Create an empty database named `icare_ci` in phpMyAdmin or your database client. Set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`. The example uses port 3306; use the port your MySQL service actually runs on.
4. For this **new** installation, run:

   ```powershell
   php spark icare:key
   php spark migrate --all
   php spark icare:admin your-email@example.edu
   php spark serve --host localhost --port 8080
   ```

5. Visit **http://localhost:8080**. Open **http://localhost:8080/login** directly (without an audience query), with the temporary password printed by `icare:admin`. It expires after 24 hours; change it at first login. Create the GCU Head/admin and other staff accounts through the account tools.

`icare:admin` refuses to run if any staff accounts already exist. It does not overwrite an existing administrator. `icare:key` keeps any existing key.

On macOS/Linux, use `cp .env.example .env` in place of `Copy-Item`. Make `writable/` and `storage/` writable by the web-server account. Never serve the project root or expose `.env`.

For a local SQLite evaluation, create an empty `writable/icare.sqlite`, set `DB_CONNECTION=sqlite` and `DB_DATABASE` to its **absolute path**, then run the same migration/admin commands. Your normal MySQL database does not need to be changed.

## Existing iCARE database

Use [the existing-database procedure](docs/MIGRATION.md#existing-database-procedure). Keep the original Laravel `APP_KEY`, database export including the `migrations` table, uploaded files, and Cloudinary credentials. Work on a copy first. Do **not** run the new-install key command, demo seeders, `migrate:refresh`, or rollback commands against your live database.

## Email and uploads

`.env.example` uses `MAIL_MAILER=log` for local setup. It records email in `writable/logs/domain.log`; it does not deliver email. Set `MAIL_MAILER=smtp` and your real `MAIL_*` values to deliver registration codes, password resets, notifications, and reminders. Enable `AUTH_OTP_ENABLED=true` only after checking delivery. Keep logs private because locally logged emails can contain one-time codes.

The original local-file and Cloudinary upload paths are preserved. For cloud storage set `CLOUDINARY_URL` on the server. Reuse the original Cloudinary account when adopting records with existing cloud identifiers. An ephemeral host needs persistent uploads/backups storage or the configured cloud service; local files do not survive a rebuilt container automatically.

## Frontend development

The bundled build points to the API on the same origin. No production URL from the source is used as a fallback.

```sh
npm ci
npm run build
```

For hot reload, leave `php spark serve` running, then run `npm run dev` and open the Vite URL ending in `/build/`. Vite proxies `/api` to `APP_URL` (default http://localhost:8080). Include your frontend origin in `CORS_ALLOWED_ORIGINS`.

For a separately hosted frontend, set `VITE_API_URL` to the CodeIgniter server origin **before building**, set `FRONTEND_URL`/`CORS_ALLOWED_ORIGINS` on the server, and replace the example API origin in `netlify.toml`'s CSP. Vite environment variables are public; never put secrets in them.

## Tests

```sh
php vendor/bin/phpunit
npm test
```

Backend tests run through CodeIgniter's routes and filters using disposable SQLite databases under `writable/tests`. They do not use the database in your `.env`. The tests retain the original business assertions and add migration-specific authentication, mail, export, and database-adoption checks. See [validation results](docs/VALIDATION.md) for the actual executed checks and remaining deployment checks.

## Scheduled tasks

Replace Laravel's `artisan schedule:run` with your OS scheduler or hosting scheduler. Run these commands from the project folder. Schedule using **Asia/Manila** time, as in the source application:

| Frequency | Command |
| --- | --- |
| Daily at 08:00 | `php spark reminders:follow-up` |
| Daily at 00:00 | `php spark backup:run --type all --trigger scheduled` |
| Hourly | `php spark app:detect-missed-appointments` |
| Hourly | `php spark reminders:appointments` |
| Every 5 minutes | `php spark emails:retry-failed` |

The authenticated cron API routes are also retained. Set `CRON_SECRET` if you use them. The web server does not start scheduled tasks automatically. Maintenance commands `php spark cases:fix-constraint` and `php spark referrals:renumber-legacy-codes --dry-run` are retained; review their output before making maintenance changes.

## Deployment

Set `CI_ENVIRONMENT=production`, `APP_ENV=production`, `APP_DEBUG=false`, the correct public `APP_URL`, and all required secrets. Point Apache/Nginx to `public/`, enable rewrite rules, provide HTTPS, and configure trusted proxy addresses in `app/Config/App.php` when your host uses a reverse proxy. For remote MySQL TLS, configure `MYSQL_ATTR_SSL_CA` and leave certificate verification enabled.

The Dockerfile builds Vue and installs production Composer dependencies. `docker build -t icare-codeigniter .` builds the image. Supply environment variables and persistent storage at runtime. Run `php spark migrate --all` explicitly against the backed-up target database before starting service; the image does not automatically mutate your database on every restart. `render.yaml` is a configuration template requiring your values. Docker/cloud deployment is separate from the local validation performed for this conversion.

The source's user manual remains in `docs/iCARE_User_Manual.md`. Historical Laravel handoff notes are under `docs/history/` and are not the setup instructions for this project.
