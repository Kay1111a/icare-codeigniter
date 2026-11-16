<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261026000001AddContentToComplaintAttachments extends Migration
{
    // Store complaint attachment files in the database (base64) instead of the
    // server's disk. Render's free tier wipes uploaded files on every redeploy,
    // which made attachments 404; the database (Aiven) is persistent.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_26_000001_add_content_to_complaint_attachments')) return;
        Schema::table('complaint_attachments', function (Blueprint $table) {
            $table->string('mime_type')->nullable()->after('original_filename');
            $table->longText('content')->nullable()->after('mime_type'); // base64 of the file
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_26_000001_add_content_to_complaint_attachments')) return;
        Schema::table('complaint_attachments', function (Blueprint $table) {
            $table->dropColumn(['mime_type', 'content']);
        });
    }
}
