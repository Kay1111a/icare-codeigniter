<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260918141817AddSuffixToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_18_141817_add_suffix_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->string('suffix', 20)->nullable()->after('middle_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_18_141817_add_suffix_to_users_table')) return;
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('suffix');
        });
    }
}
