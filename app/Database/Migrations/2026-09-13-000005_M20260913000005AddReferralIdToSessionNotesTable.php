<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913000005AddReferralIdToSessionNotesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000005_add_referral_id_to_session_notes_table')) return;
        Schema::table('session_notes', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->after('case_id')->constrained('referrals')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000005_add_referral_id_to_session_notes_table')) return;
        Schema::table('session_notes', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['referral_id']); }
            $table->dropColumn('referral_id');
        });
    }
}
