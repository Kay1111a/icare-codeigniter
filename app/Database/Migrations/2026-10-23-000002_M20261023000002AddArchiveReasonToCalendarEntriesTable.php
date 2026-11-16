<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// B536: when an archived holiday/suspension is reactivated, the admin should
// see why it was archived in the first place. The reason and note picked
// when archiving are kept on the entry itself (not just the audit log) so
// they can be shown back in the Reactivate dialog.
class M20261023000002AddArchiveReasonToCalendarEntriesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_23_000002_add_archive_reason_to_calendar_entries_table')) return;
        Schema::table('calendar_entries', function (Blueprint $table) {
            $table->string('archive_reason', 160)->nullable()->after('status');
            $table->text('archive_note')->nullable()->after('archive_reason');
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_23_000002_add_archive_reason_to_calendar_entries_table')) return;
        Schema::table('calendar_entries', function (Blueprint $table) {
            $table->dropColumn(['archive_reason', 'archive_note']);
        });
    }
}
