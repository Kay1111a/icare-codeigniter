<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261013000001AddAdmissionDetailsToReferralsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_13_000001_add_admission_details_to_referrals_table')) return;
        // The rest of the paper Admission Slip (QF-OSS-GCU-09): number of
        // days absent/tardy, causes of absences, actions taken, and the
        // "official activity" / "others" write-ins. Kept together as one JSON
        // value next to the slip's existing date, time and excused columns.
        Schema::table('referrals', function (Blueprint $table) {
            $table->json('admission_details')->nullable()->after('admission_remarks');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_13_000001_add_admission_details_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn('admission_details');
        });
    }
}
