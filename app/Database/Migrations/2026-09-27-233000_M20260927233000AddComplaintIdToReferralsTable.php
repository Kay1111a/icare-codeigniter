<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260927233000AddComplaintIdToReferralsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_27_233000_add_complaint_id_to_referrals_table')) return;
        // Links a disciplinary Referral back to the Complaint it was filed
        // from (ComplaintController::store() creates both together today,
        // but with no FK between them - so there was previously no way to
        // tell "this referral came from a filed Complaint" apart from an
        // ordinary disciplinary referral submitted directly). Nullable,
        // since an ordinary disciplinary referral has no Complaint at all.
        Schema::table('referrals', function (Blueprint $table) {
            $table->foreignId('complaint_id')->nullable()->after('case_id')
                ->constrained('complaints')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_27_233000_add_complaint_id_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'mysql') { $table->dropForeign(['complaint_id']); }
            $table->dropColumn('complaint_id');
        });
    }
}
