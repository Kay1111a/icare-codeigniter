<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\Schema;

// Audit descriptions (password resets, reactivations with reasons and notes) can
// be longer than 255 characters, which made MySQL refuse the insert and the
// whole request fail with a server error.
class M20261021000001WidenAuditLogDescription extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_21_000001_widen_audit_log_description')) return;
        Schema::table('audit_logs', function ($table) {
            $table->text('description')->change();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_21_000001_widen_audit_log_description')) return;
        // Left as text: shrinking would truncate or fail on existing rows.
    }
}
