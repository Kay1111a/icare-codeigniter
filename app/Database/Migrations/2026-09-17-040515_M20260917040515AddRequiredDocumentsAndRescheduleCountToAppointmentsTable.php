<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260917040515AddRequiredDocumentsAndRescheduleCountToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_17_040515_add_required_documents_and_reschedule_count_to_appointments_table')) return;
        Schema::table('appointments', function (Blueprint $table) {
            $table->text('required_documents')->nullable();
            $table->unsignedInteger('reschedule_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_17_040515_add_required_documents_and_reschedule_count_to_appointments_table')) return;
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['required_documents', 'reschedule_count']);
        });
    }
}
