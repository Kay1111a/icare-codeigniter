<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261001000000AddReferralIdToCaseHandoffsTable extends Migration
{
    // Without this, a handoff/endorsement was only ever tied to the case,
    // so a case carrying more than one referral (e.g. a GCU referral and
    // the sibling psychological_testing referral created by "Refer to
    // TMDU") showed the SAME handoff history on every one of its
    // referrals' SIF pages, even when the endorsement only really applied
    // to one of them. Nullable, since existing rows predate this column
    // and can't be retroactively attributed to a specific referral.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_01_000000_add_referral_id_to_case_handoffs_table')) return;
        Schema::table('case_handoffs', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->after('case_id')
                ->constrained('referrals')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_01_000000_add_referral_id_to_case_handoffs_table')) return;
        Schema::table('case_handoffs', function (Blueprint $table) {
            $table->dropConstrainedForeignId('referral_id');
        });
    }
}
