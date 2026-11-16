<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

class M20260909034743ChangeReferralTypeToStringOnReferralsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_09_034743_change_referral_type_to_string_on_referrals_table')) return;
        // Raw MySQL syntax - SQLite (used for the RBAC test suite) has no
        // MODIFY COLUMN and stores these loosely-typed anyway, so this is a
        // safe no-op there.
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE referrals MODIFY referral_type VARCHAR(50) NOT NULL");
        DB::statement("ALTER TABLE referrals MODIFY referrer_source VARCHAR(50) NULL");
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_09_034743_change_referral_type_to_string_on_referrals_table')) return;
        // Not reversible safely without knowing prior enum values
    }
}
