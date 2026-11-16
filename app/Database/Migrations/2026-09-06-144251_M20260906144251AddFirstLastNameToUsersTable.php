<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class M20260906144251AddFirstLastNameToUsersTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_06_144251_add_first_last_name_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
        });

        // Backfill existing users by splitting their name
        DB::table('users')->get()->each(function ($user) {
            $parts = explode(' ', $user->name, 2);
            DB::table('users')->where('id', $user->id)->update([
                'first_name' => $parts[0] ?? $user->name,
                'last_name'  => $parts[1] ?? '',
            ]);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_06_144251_add_first_last_name_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
}
