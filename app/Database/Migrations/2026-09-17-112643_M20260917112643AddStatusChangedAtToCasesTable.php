<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class M20260917112643AddStatusChangedAtToCasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_17_112643_add_status_changed_at_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->timestamp('status_changed_at')->nullable();
        });

        // Backfill existing rows so the inactivity clock starts from "now"
        // instead of every case looking like it's been stale forever.
        DB::table('cases')->whereNull('status_changed_at')->update(['status_changed_at' => now()]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_17_112643_add_status_changed_at_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn('status_changed_at');
        });
    }
}
