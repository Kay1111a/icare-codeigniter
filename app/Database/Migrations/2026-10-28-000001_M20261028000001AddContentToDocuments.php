<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261028000001AddContentToDocuments extends Migration
{
    // Store document files (PAR, referral slips, supporting files, etc.) in the
    // database as base64 so they survive backend redeploys. Render's free disk
    // is wiped on every deploy, which made downloads (e.g. the student's PAR) fail.
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_28_000001_add_content_to_documents')) return;
        Schema::table('documents', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('file_size'); // base64 of the file
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_28_000001_add_content_to_documents')) return;
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
}
