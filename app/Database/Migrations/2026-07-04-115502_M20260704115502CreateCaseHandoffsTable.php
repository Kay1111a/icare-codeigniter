<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260704115502CreateCaseHandoffsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_07_04_115459_create_case_handoffs_table')) return;
        Schema::create('case_handoffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_id')->constrained('cases')->cascadeOnDelete();
            $table->foreignId('from_user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('to_user_id')->constrained('users')->restrictOnDelete();
            $table->string('from_unit');
            $table->string('to_unit');
            $table->text('reason');
            $table->text('notes')->nullable();
            $table->boolean('acknowledged')->default(false);
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_07_04_115459_create_case_handoffs_table')) return;
        Schema::dropIfExists('case_handoffs');
    }
}
