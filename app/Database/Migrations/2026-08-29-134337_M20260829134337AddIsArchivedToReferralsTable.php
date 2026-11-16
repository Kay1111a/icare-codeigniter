<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260829134337AddIsArchivedToReferralsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_08_29_134337_add_is_archived_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->boolean('is_archived')->default(false)->after('status');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_08_29_134337_add_is_archived_to_referrals_table')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn('is_archived');
        });
    }
}
