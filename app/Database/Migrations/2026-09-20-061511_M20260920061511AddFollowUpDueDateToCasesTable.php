<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260920061511AddFollowUpDueDateToCasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_20_061511_add_follow_up_due_date_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->date('follow_up_due_date')->nullable()->after('follow_up_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_20_061511_add_follow_up_due_date_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
        $table->date('follow_up_due_date')->nullable()->after('follow_up_notes');
    });
    }
    
}
