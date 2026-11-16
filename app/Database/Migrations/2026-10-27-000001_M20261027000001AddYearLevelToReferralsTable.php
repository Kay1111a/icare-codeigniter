<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261027000001AddYearLevelToReferralsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_27_000001_add_year_level_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            // Snapshot of the student's year level at the time the referral
            // was filed - the Create Referral form shows it but never saved
            // it, so it was lost even though students move up a year level.
            $table->string('year_level')->nullable()->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_27_000001_add_year_level_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn('year_level');
        });
    }
}
