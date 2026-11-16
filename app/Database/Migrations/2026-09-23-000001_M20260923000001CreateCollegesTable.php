<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000001CreateCollegesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000001_create_colleges_table')) return;
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('abbrev')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000001_create_colleges_table')) return;
        Schema::dropIfExists('colleges');
    }
}
