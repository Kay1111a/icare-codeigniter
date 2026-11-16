<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260725182300AddUnreachableFlagToCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_07_25_182300_add_unreachable_flag_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->boolean('student_unreachable')->default(false)->after('referred_externally');
            $table->timestamp('unreachable_flagged_at')->nullable()->after('student_unreachable');
            $table->foreignId('unreachable_flagged_by')->nullable()->constrained('users')->nullOnDelete()->after('unreachable_flagged_at');
            $table->text('unreachable_notes')->nullable()->after('unreachable_flagged_by');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->boolean('no_show_escalated')->default(false)->after('checked_in_by_user_id');
            $table->timestamp('no_show_escalated_at')->nullable()->after('no_show_escalated');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_07_25_182300_add_unreachable_flag_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn(['student_unreachable', 'unreachable_flagged_at', 'unreachable_flagged_by', 'unreachable_notes']);
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['no_show_escalated', 'no_show_escalated_at']);
        });
    }
}
