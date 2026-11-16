<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260917142101AddTypeToCaseInterventionsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_17_142101_add_type_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->string('type')->default('other')->after('description');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_17_142101_add_type_to_case_interventions_table')) return;
        Schema::table('case_interventions', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
