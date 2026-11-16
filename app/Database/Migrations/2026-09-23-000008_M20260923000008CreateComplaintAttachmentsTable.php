<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000008CreateComplaintAttachmentsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000008_create_complaint_attachments_table')) return;
        Schema::create('complaint_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->cascadeOnDelete();
            $table->string('category'); // 'evidence' or 'affidavit'
            $table->string('file_path');
            $table->string('original_filename');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000008_create_complaint_attachments_table')) return;
        Schema::dropIfExists('complaint_attachments');
    }
}
