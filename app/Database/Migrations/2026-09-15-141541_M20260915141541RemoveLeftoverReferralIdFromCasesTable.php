<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260915141541RemoveLeftoverReferralIdFromCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_15_141541_remove_leftover_referral_id_from_cases_table')) return;
        // SQLite refuses to DROP COLUMN on a column that carries a
        // REFERENCES clause (the FK is baked into the table definition
        // there, not a separately droppable named constraint like MySQL's),
        // so this whole cleanup step is MySQL-only - leaving the leftover
        // column in place on SQLite (used for the RBAC test suite) is
        // harmless.
        if (DB::connection()->getDriverName() === 'mysql') {
            Schema::table('cases', function (Blueprint $table) {
                if (Schema::hasColumn('cases', 'referral_id')) {
                    $table->dropForeign(['referral_id']);
                    $table->dropColumn('referral_id');
                }
            });
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_15_141541_remove_leftover_referral_id_from_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->constrained('referrals')->nullOnDelete();
        });
    }
}
