<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000009AddConsentAcceptedAtToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000009_add_consent_accepted_at_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->timestamp('consent_accepted_at')->nullable()->after('last_login_at');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000009_add_consent_accepted_at_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('consent_accepted_at');
        });
    }
}
