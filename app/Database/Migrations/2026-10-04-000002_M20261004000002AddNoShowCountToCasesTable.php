<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261004000002AddNoShowCountToCasesTable extends Migration
{
    // Counts actual no-shows across every appointment for this case, so a
    // student who simply doesn't show up (without ever requesting a
    // reschedule) still gets flagged after enough repeats. Previously the
    // only escalation path was AppointmentController::
    // requestRescheduleByStudent() hitting RESCHEDULE_LIMIT - a student who
    // never asks to reschedule but repeatedly no-shows was never counted.
    // Kept on the case (not the appointment) because a no-show's escalation
    // needs to persist across separate booking cycles, not reset every time
    // a new Appointment row is created for the next attempt.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_04_000002_add_no_show_count_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->unsignedInteger('no_show_count')->default(0)->after('status_changed_at');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_04_000002_add_no_show_count_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn('no_show_count');
        });
    }
}
