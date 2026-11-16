<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Reconstructed to match this project's live database history.
class M20260911140000LinkReferralsToCasesPerStudent extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_11_140000_link_referrals_to_cases_per_student')) return;
        if (Schema::hasColumn('referrals', 'case_id')) {
            return;
        }

        Schema::table('referrals', function (Blueprint $table) {
            $table->foreignId('case_id')->nullable()->after('student_id')->constrained('cases')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_11_140000_link_referrals_to_cases_per_student')) return;
        Schema::table('referrals', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['case_id']); }
            $table->dropColumn('case_id');
        });
    }
}
