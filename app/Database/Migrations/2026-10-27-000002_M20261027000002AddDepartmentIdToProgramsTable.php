<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261027000002AddDepartmentIdToProgramsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_27_000002_add_department_id_to_programs_table')) return;
        Schema::table('programs', function (Blueprint $table) {
            // Links a Program to the Department it belongs to (both lists
            // live under Management, but were never connected - DeptChairs
            // and Faculty are scoped by department, students only carry a
            // program name, so that scoping had to guess by matching text).
            // Nullable: a program can be added before its department is.
            $table->foreignId('department_id')->nullable()->after('college_id')
                ->constrained('departments')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_27_000002_add_department_id_to_programs_table')) return;
        Schema::table('programs', function (Blueprint $table) {
            $table->dropConstrainedForeignId('department_id');
        });
    }
}
