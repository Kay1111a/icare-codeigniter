<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260913072456AddTempPasswordFieldsToUsersTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_072456_add_temp_password_fields_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('must_change_password')->default(true)->after('password');
            $table->string('temp_password')->nullable()->after('must_change_password');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_072456_add_temp_password_fields_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['must_change_password', 'temp_password']);
        });
    }
}
