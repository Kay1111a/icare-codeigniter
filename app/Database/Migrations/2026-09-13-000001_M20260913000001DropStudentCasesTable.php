<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\Schema;

// Reconstructed to match this project's live database history - the pivot
// approach from 2026_09_11_083505_create_student_cases_table was abandoned in
// favor of referrals.case_id (see 2026_09_11_140000_link_referrals_to_cases_per_student).
class M20260913000001DropStudentCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000001_drop_student_cases_table')) return;
        Schema::dropIfExists('student_cases');
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000001_drop_student_cases_table')) return;
        Schema::create('student_cases', function ($table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('case_id')->constrained('cases')->cascadeOnDelete();
            $table->timestamps();
        });
    }
}
