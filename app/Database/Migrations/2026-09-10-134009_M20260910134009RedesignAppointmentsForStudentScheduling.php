<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260910134009RedesignAppointmentsForStudentScheduling extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_10_134009_redesign_appointments_for_student_scheduling')) return;
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_10_134009_redesign_appointments_for_student_scheduling')) return;
        //
    }
}
