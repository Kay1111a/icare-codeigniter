<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

// Same issue as year_level (see 2026_09_13_000003): the API validates
// college as nullable but the column itself had no default and rejected
// NULL, crashing "add student" with a raw SQL error whenever it was omitted.
class M20260913000004MakeCollegeNullableOnStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000004_make_college_nullable_on_students_table')) return;
        // Raw MySQL syntax - no-op on SQLite (used for the RBAC test suite),
        // which has no MODIFY COLUMN and allows NULL here regardless.
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE students MODIFY college VARCHAR(255) NULL');
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000004_make_college_nullable_on_students_table')) return;
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE students MODIFY college VARCHAR(255) NOT NULL DEFAULT ''");
    }
}
