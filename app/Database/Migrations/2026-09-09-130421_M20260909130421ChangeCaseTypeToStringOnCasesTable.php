<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

class M20260909130421ChangeCaseTypeToStringOnCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_09_130421_change_case_type_to_string_on_cases_table')) return;
        // Raw MySQL syntax - no-op on SQLite (used for the RBAC test suite),
        // which has no MODIFY COLUMN and stores this loosely-typed anyway.
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE cases MODIFY case_type VARCHAR(50) NOT NULL");
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_09_130421_change_case_type_to_string_on_cases_table')) return;
        // Not reversible safely without knowing prior enum values
    }
}
