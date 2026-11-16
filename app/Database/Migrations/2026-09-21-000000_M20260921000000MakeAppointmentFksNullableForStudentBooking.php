<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260921000000MakeAppointmentFksNullableForStudentBooking extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_21_000000_make_appointment_fks_nullable_for_student_booking')) return;
        // MySQL can't modify an FK column while the constraint exists.
        // Drop → change → re-add, in three separate statements.
        Schema::table('appointments', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['case_id']); }
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['staff_user_id']); }
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['created_by_user_id']); }
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('case_id')->nullable()->change();
            $table->foreignId('staff_user_id')->nullable()->change();
            $table->foreignId('created_by_user_id')->nullable()->change();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('case_id')->references('id')->on('cases')->restrictOnDelete();
            $table->foreign('staff_user_id')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('created_by_user_id')->references('id')->on('users')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_21_000000_make_appointment_fks_nullable_for_student_booking')) return;
        Schema::table('appointments', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['case_id']); }
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['staff_user_id']); }
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['created_by_user_id']); }
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('case_id')->nullable(false)->change();
            $table->foreignId('staff_user_id')->nullable(false)->change();
            $table->foreignId('created_by_user_id')->nullable(false)->change();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('case_id')->references('id')->on('cases')->restrictOnDelete();
            $table->foreign('staff_user_id')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('created_by_user_id')->references('id')->on('users')->restrictOnDelete();
        });
    }
}
