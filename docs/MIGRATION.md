# Migration design and database adoption

## What changed

| Original Laravel responsibility | Converted implementation |
| --- | --- |
| `public/index.php`, HTTP Kernel | CodeIgniter `Boot::bootWeb`, native front controller |
| API routes | Explicit `app/Config/Routes.php` registrations backed by `ApiContracts.php` |
| Auth/actor/role/password/throttle middleware | Native `ApiAccess` filter invoking the preserved authorization rules |
| Sanctum package | Compatible hashed bearer tokens in the original `personal_access_tokens` table |
| Controllers | `app/Controllers/Api`, extending the CodeIgniter base controller |
| Eloquent models | Preserved standalone Eloquent models under `app/Models` |
| Laravel application/container | Small standalone component container under `app/Libraries/Bridge` |
| 132 database migrations | 132 native CodeIgniter migration classes, preserving their schema operations |
| `artisan` tasks | Native Spark wrappers for all seven existing maintenance/scheduled handlers |
| Blade email/PDF rendering | Standalone Blade and Dompdf |
| Laravel Vite plugin | Vite + Vue plugin, compiled SPA served by CodeIgniter |
| Laravel test application | Native CodeIgniter test request lifecycle, with adapters retaining original assertions |

The route manifest preserves 279 expanded route contracts, including the original duplicate declarations. Native registration resolves duplicate verb/URI pairs using the original Laravel rule: the last declaration wins. This matters for the student dashboard and profile routes. GET endpoints also support HEAD requests. Unmatched API paths return JSON 404 instead of the SPA HTML.

API validation status codes, downloads, pagination, implicit model lookup, role boundaries, temporary-password restrictions, token expiration/revocation, and sanitization have adapters. Password hashes and token hashes keep their existing formats. Standalone Illuminate packages were upgraded to 12.x for current dependency compatibility; `laravel/framework` is absent. Configuration used by these components lives under `app/Config/Domain`; native CodeIgniter configuration lives directly under `app/Config`.

This approach avoids replacing the existing model/query/notification logic with a second implementation. A future all-native CodeIgniter data-layer rewrite would be additional work. Do not remove the standalone packages or bridge files from this deliverable.

## Existing-database procedure

1. Back up the original database and upload/storage folders. Export the **entire** database, including its Laravel `migrations` table and token table. Preserve the original `APP_KEY` and external-service credentials separately.
2. Import the export into a **separate staging database**, such as `icare_ci_staging`. Configure both native CodeIgniter and Eloquent through the same `DB_*` values in `.env`; these values are read by both layers.
3. Set `.env` `APP_KEY` to the original key. Do not generate a replacement. Copy the original private `storage/app` files into the corresponding folder; retain document paths. Reuse the Cloudinary account for records stored there. Do not copy old compiled views, framework caches, `.env`, vendor, or node_modules over this application.
4. Run `composer install`, then `php spark migrate --all` against the staging copy. Each converted migration checks whether its original filename is recorded in the old `migrations` table. If recorded, its schema/data operations are skipped and the native migration runner records it in **`ci_migrations`**. The two ledgers remain separate.
5. Check `php spark migrate:status`. Test each user role, existing logins/password changes, student profile updates, referrals, complaints, appointments, testing records, uploads/downloads, reports, audit logs, backup/restore, and email delivery against the staging system.
6. Plan a cutover after those checks. Take a fresh backup and stop writes to the old application during the final copy. Update the frontend/API URLs and schedules. Keep the original system and backup available for rollback.

A database without an accurate original migration ledger cannot safely be adopted automatically. Restore the ledger from the matching backup or reconcile its schema/history first. Never use `migrate:refresh` to adopt existing data. Previously applied Laravel migrations are also protected from `down()` in the converted migration classes; that protection does not make general rollback of a live installation safe.

The original source contains historical data migrations, including password reset and cleanup migrations. If those are genuinely pending in the imported ledger, `migrate` will execute their original operations. Review pending entries and the migration map before applying them to important data. `tools/migration-map.json` maps each original filename to its native class/file; timestamp collisions were disambiguated while preserving original ordering.

## Scope retained

Staff and student authentication, registration and password reset; GCU, TMDU, SDU, Faculty/Department Chair/Dean and system-admin permissions; student and staff account management; masterlist preview/import; referrals and complaints; case notes and feedback; appointments and holiday blocks; testing/PAR workflows; uploaded documents; reports and exports; notifications/reminders; audit trail and backups remain represented in the original business code and API contracts.

External SMTP, Cloudinary credentials, hosting settings, and your real database contents are not included in the source ZIP and must be supplied by the deployment owner. A passing automated suite is not a claim that every combination of real production data and external-service settings has been exercised.
