<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000002CreateProgramsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000002_create_programs_table')) return;
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
            $table->unique(['college_id', 'name']);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000002_create_programs_table')) return;
        Schema::dropIfExists('programs');
    }
}
