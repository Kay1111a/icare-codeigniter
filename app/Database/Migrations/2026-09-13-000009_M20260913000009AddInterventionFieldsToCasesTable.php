<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913000009AddInterventionFieldsToCasesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000009_add_intervention_fields_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->foreignId('intervention_person_in_charge_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('intervention_date')->nullable();
            $table->boolean('intervention_excused')->nullable();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000009_add_intervention_fields_to_cases_table')) return;
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn(['intervention_person_in_charge_id', 'intervention_date', 'intervention_excused']);
        });
    }
}
