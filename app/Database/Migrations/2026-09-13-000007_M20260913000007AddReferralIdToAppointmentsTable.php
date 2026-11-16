<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913000007AddReferralIdToAppointmentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000007_add_referral_id_to_appointments_table')) return;
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->after('case_id')->constrained('referrals')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000007_add_referral_id_to_appointments_table')) return;
        Schema::table('appointments', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['referral_id']); }
            $table->dropColumn('referral_id');
        });
    }
}
