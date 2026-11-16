<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261101000001AddSevereFlagToCasesTable extends Migration {
    public function up(): void
    {
        if ($this->alreadyApplied('2026_11_01_000001_add_severe_flag_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            if (!Schema::hasColumn('cases', 'is_severe')) {
                $table->boolean('is_severe')->default(false)->after('status');
            }
            if (!Schema::hasColumn('cases', 'severe_reason')) {
                $table->text('severe_reason')->nullable()->after('is_severe');
            }
            if (!Schema::hasColumn('cases', 'severe_flagged_at')) {
                $table->timestamp('severe_flagged_at')->nullable()->after('severe_reason');
            }
            if (!Schema::hasColumn('cases', 'severe_flagged_by')) {
                $table->foreignId('severe_flagged_by')->nullable()->after('severe_flagged_at')
                      ->constrained('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_11_01_000001_add_severe_flag_to_cases_table')) return;
        if (Schema::hasColumn('cases', 'severe_flagged_by')) {
            Schema::table('cases', fn(Blueprint $t) => $t->dropForeign(['severe_flagged_by']));
        }

        Schema::table('cases', function (Blueprint $table) {
            foreach (['severe_flagged_by', 'severe_flagged_at', 'severe_reason', 'is_severe'] as $col) {
                if (Schema::hasColumn('cases', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}
