<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261004000001CreateParentConferenceSlipsTable extends Migration
{
    // One immutable record per Parent Conference Slip issued for a case -
    // same "never overwritten" pattern as feedback_slips/session_notes. The
    // slip itself is handed to the parent face-to-face (it's not emailed or
    // routed anywhere in-system), so this is just the issuance record GCU
    // keeps: when it was issued, for what reason, and any remarks.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_04_000001_create_parent_conference_slips_table')) return;
        Schema::create('parent_conference_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_id')->constrained('cases')->cascadeOnDelete();
            $table->foreignId('issued_by_user_id')->constrained('users')->restrictOnDelete();
            $table->date('conference_date');
            $table->time('conference_time');
            $table->string('reason');
            $table->text('remarks')->nullable();
            $table->timestamp('issued_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_04_000001_create_parent_conference_slips_table')) return;
        Schema::dropIfExists('parent_conference_slips');
    }
}
