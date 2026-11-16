<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260916000001AddCompletionToCaseInterventionsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_16_000001_add_completion_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->boolean('is_completed')->default(false)->after('excused');
            $table->timestamp('completed_at')->nullable()->after('is_completed');
            $table->foreignId('completed_by_user_id')->nullable()->after('completed_at')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_16_000001_add_completion_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('completed_by_user_id');
            $table->dropColumn(['is_completed', 'completed_at']);
        });
    }
}
