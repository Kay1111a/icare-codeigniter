<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

/**
 * The `status` column on referrals is a DB-level enum that never included
 * 'cancelled', even though AppointmentController::cancel()/cancelByStudent()
 * already write that exact value onto the linked referral whenever a
 * scheduled/in_progress appointment gets cancelled (B193's fix). That
 * mismatch causes "Data truncated for column 'status'" whenever a
 * confirmed/in-progress appointment is cancelled - this is a pure widen (no
 * renaming of existing values, 'in_review' is left alone too since existing
 * rows/behavior elsewhere don't depend on it being removed), so it's safe to
 * run directly with no intermediate data migration step.
 */
class M20261004120100WidenReferralsStatusEnumAddCancelled extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_04_120100_widen_referrals_status_enum_add_cancelled')) return;
        // Raw MySQL enum syntax - no-op on SQLite (used for the RBAC test
        // suite), which has no MODIFY COLUMN and stores status loosely-typed
        // anyway, so every value here is already accepted.
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE referrals MODIFY COLUMN status ENUM(
            'submitted',
            'acknowledged',
            'in_review',
            'scheduled',
            'in_progress',
            'referred_tmdu',
            'referred_external',
            'completed',
            'closed',
            'cancelled'
        ) DEFAULT 'submitted'");
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_04_120100_widen_referrals_status_enum_add_cancelled')) return;
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE referrals MODIFY COLUMN status ENUM(
            'submitted',
            'acknowledged',
            'in_review',
            'scheduled',
            'in_progress',
            'referred_tmdu',
            'referred_external',
            'completed',
            'closed'
        ) DEFAULT 'submitted'");
    }
}
