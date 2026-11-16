# Conversion validation

Validated on 8 November 2026 (Asia/Manila), using the uploaded iCARE source as the baseline.

| Check | Result |
| --- | --- |
| Original Laravel backend suite | **455 tests, 1,695 assertions passed** |
| Converted CodeIgniter backend suite | **463 tests, 1,726 assertions passed** |
| Original business tests within the converted suite | All 455 retained and passed |
| Additional conversion regression tests | 8 passed |
| Vue component/store tests | **36 tests across 3 files passed** |
| Production Vue build | Passed; compiled output included in `public/build` |
| Fresh native migrations on SQLite | All **132** completed |
| Fresh native migrations on MariaDB 10.11.7 | All **132** completed |
| Re-running migrations on MariaDB | No migrations replayed; ledger stayed at 132 |
| Adoption of a complete simulated Laravel migration ledger on MariaDB | All 132 adopted into `ci_migrations`; existing administrator/password unchanged |
| Administrator bootstrap command | Created initial account on SQLite and MariaDB |
| Real local HTTP server checks | **15 checks passed** |
| PHP syntax checks | All application, migration, command, test, and conversion PHP files passed |
| Composer manifest/lock validation | Passed |
| Composer security advisory audit | No advisories reported at validation time |

## What the checks establish

The original source was installed separately and its existing suite executed first. The converted suite exercises native CodeIgniter routing/filter dispatch while keeping the existing assertions for authentication, role/college/department scopes, student/staff records, masterlists, referrals, complaints, cases, appointments, testing workflows, reports, notifications, audit, and backup behavior.

The extra regression tests cover real bearer-token issuance/revocation; staff/student separation; expired, altered, and inactive-account tokens; duplicate student-route precedence; native filter throttling; actual Markdown email rendering with the in-memory mail transport; binary XLSX contents; JSON 404 behavior; and protection of existing tables during migration adoption.

The HTTP checks start the actual CodeIgniter PHP entry point. They cover GET/HEAD health responses, SPA and JS asset delivery, anonymous denial, login, account lookup, forced-password restrictions, password change, logout/revocation, unknown API paths, and CORS preflight. They use a disposable database and generated test administrator.

MariaDB checks create a disposable database, apply all converted migrations, run them again, and create an administrator. A complete legacy migration ledger is then supplied and the native ledger rebuilt; the administrator's stored password is compared before/after. This is a simulated adoption, not a migration of the user's live database.

## Test adaptation details

The original Laravel test application was replaced by a CodeIgniter test bootstrap. `Tests\Support\TokenAuth` serves only the existing fake-login test calls; the additional token tests authenticate with actual bearer strings. JSON/multipart adapters reproduce real request encoding, and the command adapter runs the preserved handlers without booting Laravel.

Two original dashboard test fixtures referenced `complaint_id = 1` without creating a complaint. Standalone Illuminate 12's SQLite schema handling enforces that foreign key, so those two fixtures now create valid complaint records. Their assertions and the application access/business rules were retained. No application authorization check was disabled to make these tests pass. Login rate limiting is disabled only in the original test adapter and is explicitly enabled/tested in the added throttle test.

## Runtime and limitations

Executed with PHP 8.3.6, CodeIgniter 4.7.6, standalone Illuminate 12.x, PHPUnit 10.5.66, Node 24.22.1, Vite 7.3.7, and MariaDB 10.11.7. Exact installed PHP/JS dependencies are pinned in the lockfiles. Install a maintained PHP 8.3+ patch release on your own server.

The complete backend regression suite ran on SQLite. MariaDB received migration/adoption/admin-creation smoke tests, not a second full backend suite. A real production database export was not provided separately and was not tested. SMTP delivery, Cloudinary operations against live credentials, hosting proxy/TLS settings, Windows/Apache configuration, Docker image execution, browser E2E, load testing, and code coverage were not claimed as validated. Review these on your staging deployment before replacing the live system.

Original source hashes, test counts, and concise machine-readable validation evidence are included in `docs/validation-summary.json`. No test database, generated password, runtime log, real `.env`, vendor directory, or node_modules directory is shipped.
