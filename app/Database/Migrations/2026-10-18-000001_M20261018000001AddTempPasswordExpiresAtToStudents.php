<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// A one-time password sent when a student registers works as a password only
// for a short time. NULL = the password does not expire (every other case).
class M20261018000001AddTempPasswordExpiresAtToStudents extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_18_000001_add_temp_password_expires_at_to_students')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->timestamp('temp_password_expires_at')->nullable()->after('must_change_password');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_18_000001_add_temp_password_expires_at_to_students')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('temp_password_expires_at');
        });
    }
}
