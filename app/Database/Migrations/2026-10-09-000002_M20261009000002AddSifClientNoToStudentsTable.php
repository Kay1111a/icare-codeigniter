<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Student Information Sheet (SIF) Ctrl No. is "<year>-<term>-<client no.>",
// e.g. 26-1-0012. This is the client no. part: which number client the
// student is. Editable by GCU on the SIF.
class M20261009000002AddSifClientNoToStudentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_09_000002_add_sif_client_no_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'sif_client_no')) {
                $table->unsignedInteger('sif_client_no')->nullable();
            }
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_09_000002_add_sif_client_no_to_students_table')) return;
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasColumn('students', 'sif_client_no')) {
                $table->dropColumn('sif_client_no');
            }
        });
    }
}
