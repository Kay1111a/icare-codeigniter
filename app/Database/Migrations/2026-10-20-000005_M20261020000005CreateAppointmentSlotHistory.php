<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// A reschedule now updates the SAME appointment. Every slot it gave up is kept
// here so it can be shown in the history and never offered again.
class M20261020000005CreateAppointmentSlotHistory extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_20_000005_create_appointment_slot_history')) return;
        if (!Schema::hasTable('appointment_slot_history')) {
            Schema::create('appointment_slot_history', function (Blueprint $t) {
                $t->id();
                $t->unsignedBigInteger('appointment_id')->index();
                $t->date('slot_date');
                $t->string('start_time', 8);
                $t->string('end_time', 8);
                $t->unsignedBigInteger('staff_user_id')->nullable();
                $t->text('reason')->nullable();
                $t->string('rescheduled_by_type', 10)->default('staff');   // staff | student
                $t->string('rescheduled_by_name')->nullable();
                $t->timestamp('created_at')->nullable();
            });
        }
        if (!Schema::hasColumn('appointments', 'times_rescheduled')) {
            Schema::table('appointments', function (Blueprint $t) {
                $t->unsignedInteger('times_rescheduled')->default(0);
            });
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_20_000005_create_appointment_slot_history')) return;
        Schema::dropIfExists('appointment_slot_history');
        Schema::table('appointments', fn (Blueprint $t) => $t->dropColumn('times_rescheduled'));
    }
}
