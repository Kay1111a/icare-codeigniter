<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Students get their own reset-token table so a staff account and a student
// account that share an email address can no longer overwrite each other's token.
class M20261009000001CreateStudentPasswordResetTokensTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_09_000001_create_student_password_reset_tokens_table')) return;
        Schema::create('student_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_09_000001_create_student_password_reset_tokens_table')) return;
        Schema::dropIfExists('student_password_reset_tokens');
    }
}
