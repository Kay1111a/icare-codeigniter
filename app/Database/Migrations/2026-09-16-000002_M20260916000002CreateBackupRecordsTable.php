<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260916000002CreateBackupRecordsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_16_000002_create_backup_records_table')) return;
        Schema::create('backup_records', function (Blueprint $table) {
            $table->id();
            $table->string('type');    // data | config
            $table->string('trigger'); // scheduled | manual
            $table->string('status')->default('pending'); // pending | completed | failed
            $table->boolean('verified')->default(false);
            $table->string('file_path')->nullable();
            $table->json('row_counts')->nullable();
            $table->text('error_message')->nullable();
            $table->foreignId('initiated_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_16_000002_create_backup_records_table')) return;
        Schema::dropIfExists('backup_records');
    }
}
