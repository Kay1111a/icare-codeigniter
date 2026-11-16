<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260911121653AddLoginCredentialsToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_11_121653_add_login_credentials_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->string('password')->nullable()->after('email');
            $table->timestamp('email_verified_at')->nullable()->after('password');
            $table->timestamp('last_login_at')->nullable()->after('email_verified_at');
            $table->boolean('must_change_password')->default(true)->after('last_login_at');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_11_121653_add_login_credentials_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['password', 'email_verified_at', 'last_login_at', 'must_change_password']);
        });
    }
}
