<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Parent Conference now behaves like a Follow-up Session: each slip opens in
// a floating modal where GCU records the conference notes once. Once saved,
// the notes are final (see CaseController::saveParentConferenceNotes()).
class M20261006000002AddNotesToParentConferenceSlipsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_06_000002_add_notes_to_parent_conference_slips_table')) return;
        Schema::table('parent_conference_slips', function (Blueprint $table) {
            $table->text('notes')->nullable()->after('remarks');
            $table->foreignId('notes_recorded_by_user_id')->nullable()->after('notes')->constrained('users')->nullOnDelete();
            $table->timestamp('notes_recorded_at')->nullable()->after('notes_recorded_by_user_id');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_06_000002_add_notes_to_parent_conference_slips_table')) return;
        Schema::table('parent_conference_slips', function (Blueprint $table) {
            $table->dropConstrainedForeignId('notes_recorded_by_user_id');
            $table->dropColumn(['notes', 'notes_recorded_at']);
        });
    }
}
