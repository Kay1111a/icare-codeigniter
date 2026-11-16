<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260908153804AddMiddleNameToUsersTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_08_153804_add_middle_name_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->string('middle_name')->nullable()->after('first_name');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_08_153804_add_middle_name_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('middle_name');
        });
    }
}
