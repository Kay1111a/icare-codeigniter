<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000011AddUnitToReferralFormOptionsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000011_add_unit_to_referral_form_options_table')) return;
        Schema::table('referral_form_options', function (Blueprint $table) {
            // Which unit a Wellness Service (referral_type) belongs to - 'GCU' or
            // 'TMDU'. Only meaningful for referral_type options; null for
            // referral_source and act_of_misconduct. This is a routing/filter tag
            // only - referrals to TMDU still go through GCU first as a process,
            // this column does not enforce that.
            $table->string('unit')->nullable()->after('label');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000011_add_unit_to_referral_form_options_table')) return;
        Schema::table('referral_form_options', function (Blueprint $table) {
            $table->dropColumn('unit');
        });
    }
}
