<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000006CreateComplaintsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000006_create_complaints_table')) return;
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_code')->unique();

            // The student being complained about. Kept as a real FK (like
            // Referral::student_id) since complaints are always filed against
            // an existing BSU student record.
            $table->foreignId('complainee_student_id')->constrained('students')->cascadeOnDelete();

            // Reuses the same "act_of_misconduct" category from the Management
            // reference data (referral_form_options) that used to live inline
            // in the Refer Student form - same stored value format (label text).
            $table->string('violation_type');

            $table->text('description');
            $table->date('incident_date')->nullable();

            $table->foreignId('filed_by_user_id')->constrained('users')->cascadeOnDelete();

            // Deliberately simple - no urgency/unit/counselor routing like
            // referrals. Kept to pending/under_review/resolved since these
            // are sensitive and reviewed only by SDU Head.
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000006_create_complaints_table')) return;
        Schema::dropIfExists('complaints');
    }
}
