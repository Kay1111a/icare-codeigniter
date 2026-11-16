<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Remembers when, how and by whom each account's password was last changed,
// so the Reset Password dialog can show it to the administrator.
class M20261020000004AddPasswordChangeInfo extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_20_000004_add_password_change_info')) return;
        foreach (['users', 'students'] as $table) {
            if (Schema::hasColumn($table, 'password_changed_at')) continue;
            Schema::table($table, function (Blueprint $t) {
                $t->timestamp('password_changed_at')->nullable();
                $t->string('password_change_source', 30)->nullable();   // self | email_link | admin_reset | registration
                $t->string('password_changed_by_name')->nullable();
            });
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_20_000004_add_password_change_info')) return;
        foreach (['users', 'students'] as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn(['password_changed_at', 'password_change_source', 'password_changed_by_name']);
            });
        }
    }
}
