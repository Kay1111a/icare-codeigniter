<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class M20261018000004AddStudentSendersToReferralsAndComplaints extends Migration
{
    // Students can now refer another student and file a complaint from the
    // student portal, so a referral / complaint may be sent by a student
    // instead of a staff account. The sender is kept in *_by_student_id and
    // the staff column stays empty.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_18_000004_add_student_senders_to_referrals_and_complaints')) return;
        Schema::table('referrals', function (Blueprint $table) {
            $table->unsignedBigInteger('referred_by_student_id')->nullable()->after('referred_by_user_id')->index();
        });

        Schema::table('complaints', function (Blueprint $table) {
            $table->unsignedBigInteger('filed_by_student_id')->nullable()->after('filed_by_user_id')->index();
        });

        if (DB::getDriverName() === 'mysql') {
            Schema::table('complaints', fn (Blueprint $t) => $t->dropForeign(['filed_by_user_id']));
            DB::statement('ALTER TABLE complaints MODIFY filed_by_user_id BIGINT UNSIGNED NULL');
            Schema::table('complaints', fn (Blueprint $t) => $t->foreign('filed_by_user_id')->references('id')->on('users')->cascadeOnDelete());
        } else {
            // The SQLite test database never got the self-referral change either.
            Schema::table('complaints', fn (Blueprint $t) => $t->unsignedBigInteger('filed_by_user_id')->nullable()->change());
            Schema::table('referrals', fn (Blueprint $t) => $t->unsignedBigInteger('referred_by_user_id')->nullable()->change());
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_18_000004_add_student_senders_to_referrals_and_complaints')) return;
        Schema::table('complaints', fn (Blueprint $t) => $t->dropColumn('filed_by_student_id'));
        Schema::table('referrals', fn (Blueprint $t) => $t->dropColumn('referred_by_student_id'));
    }
}
