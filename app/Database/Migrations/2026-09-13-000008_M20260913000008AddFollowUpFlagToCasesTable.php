<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913000008AddFollowUpFlagToCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000008_add_follow_up_flag_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->text('follow_up_notes')->nullable()->after('requires_follow_up');
            $table->timestamp('follow_up_flagged_at')->nullable()->after('follow_up_notes');
            $table->foreignId('follow_up_flagged_by')->nullable()->constrained('users')->nullOnDelete()->after('follow_up_flagged_at');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000008_add_follow_up_flag_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn(['follow_up_notes', 'follow_up_flagged_at', 'follow_up_flagged_by']);
        });
    }
}
