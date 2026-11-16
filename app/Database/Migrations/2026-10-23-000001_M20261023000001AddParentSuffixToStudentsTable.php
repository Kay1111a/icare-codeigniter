<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// B523: a suffix (Jr., Sr., II, ...) for the father and mother, next to their
// names in the Family section of the student's My Account page. Siblings
// already store a suffix inside the existing `siblings` JSON column, so no
// column is needed for them here.
class M20261023000001AddParentSuffixToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_23_000001_add_parent_suffix_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->string('father_suffix', 20)->nullable()->after('father_last_name');
            $table->string('mother_suffix', 20)->nullable()->after('mother_last_name');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_23_000001_add_parent_suffix_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['father_suffix', 'mother_suffix']);
        });
    }
}
