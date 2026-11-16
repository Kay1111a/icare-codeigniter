<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// B545: the father/mother suffix added in 2026_10_23_000001 (B523) missed the
// Legal Guardian, who gets a name suffix (Jr., Sr., II, ...) too.
class M20261024000001AddGuardianSuffixToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_24_000001_add_guardian_suffix_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->string('guardian_suffix', 20)->nullable()->after('guardian_last_name');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_24_000001_add_guardian_suffix_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('guardian_suffix');
        });
    }
}
