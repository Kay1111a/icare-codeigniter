<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260819170701AddReferrerSourceToReferralsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_08_19_170701_add_referrer_source_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->string('referrer_source')->nullable()->after('referrer_role');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_08_19_170701_add_referrer_source_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn('referrer_source');
        });
    }
}
