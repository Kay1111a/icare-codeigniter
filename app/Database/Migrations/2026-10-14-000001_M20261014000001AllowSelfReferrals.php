<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

class M20261014000001AllowSelfReferrals extends Migration
{
    // A student can now refer themselves from the student portal. Such a
    // referral has no staff referrer, so referred_by_user_id may be empty
    // (is_self_referred tells them apart). Existing rows are untouched.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_14_000001_allow_self_referrals')) return;
        if (DB::getDriverName() !== 'mysql') {
            return;   // the SQLite test database keeps the old rule
        }
        DB::statement('ALTER TABLE referrals MODIFY referred_by_user_id BIGINT UNSIGNED NULL');
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_14_000001_allow_self_referrals')) return;
        if (DB::getDriverName() !== 'mysql') {
            return;
        }
        // Only possible while no self-referral exists.
        DB::statement('ALTER TABLE referrals MODIFY referred_by_user_id BIGINT UNSIGNED NOT NULL');
    }
}
