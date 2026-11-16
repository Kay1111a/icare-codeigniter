<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913000011AddReferralIdToCaseInterventionsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000011_add_referral_id_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->after('case_id')->constrained('referrals')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000011_add_referral_id_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('referral_id');
        });
    }
}
