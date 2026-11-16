<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260920043518AddDeactivationReasonToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_20_043518_add_deactivation_reason_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->string('deactivation_reason')->nullable()->after('is_active');
            $table->text('deactivation_notes')->nullable()->after('deactivation_reason');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_20_043518_add_deactivation_reason_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['deactivation_reason', 'deactivation_notes']);
        });
    }
}
