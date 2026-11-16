<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260704115452CreateStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_07_04_115452_create_students_table')) return;
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('sex', ['Male', 'Female', 'Prefer not to say'])->nullable();
            $table->date('birthdate')->nullable();
            $table->string('year_level');
            $table->string('college');
            $table->string('program')->nullable();
            $table->string('section')->nullable();
            $table->string('address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->text('medical_notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_07_04_115452_create_students_table')) return;
        Schema::dropIfExists('students');
    }
}
