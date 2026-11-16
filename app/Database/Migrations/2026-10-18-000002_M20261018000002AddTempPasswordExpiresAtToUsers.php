<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Same as for students: the one-time password a faculty / dean member gets when
// they register only works for a short time. NULL = it does not expire.
class M20261018000002AddTempPasswordExpiresAtToUsers extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_18_000002_add_temp_password_expires_at_to_users')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('temp_password_expires_at')->nullable()->after('must_change_password');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_18_000002_add_temp_password_expires_at_to_users')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('temp_password_expires_at');
        });
    }
}
