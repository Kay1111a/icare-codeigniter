<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913072514AddTempPasswordToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_072514_add_temp_password_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->string('temp_password')->nullable()->after('must_change_password');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_072514_add_temp_password_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('temp_password');
        });
    }
}
