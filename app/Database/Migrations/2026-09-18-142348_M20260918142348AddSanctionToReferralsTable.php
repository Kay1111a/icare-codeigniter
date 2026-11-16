<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260918142348AddSanctionToReferralsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_18_142348_add_sanction_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->string('sanction')->nullable()->after('incident_date');
            $table->text('sanction_notes')->nullable()->after('sanction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_18_142348_add_sanction_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn(['sanction', 'sanction_notes']);
        });
    }
}
