<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

// The API validates year_level as nullable, but the column itself had no
// default and rejected NULL - any request that omitted it (e.g. adding a
// student before their year level is known) crashed with a raw SQL error
// instead of the intended "field is optional" behavior.
class M20260913000003MakeYearLevelNullableOnStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000003_make_year_level_nullable_on_students_table')) return;
        // Raw MySQL syntax - no-op on SQLite (used for the RBAC test suite),
        // which has no MODIFY COLUMN and allows NULL here regardless.
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE students MODIFY year_level VARCHAR(255) NULL');
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000003_make_year_level_nullable_on_students_table')) return;
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE students MODIFY year_level VARCHAR(255) NOT NULL DEFAULT '1st Year'");
    }
}
