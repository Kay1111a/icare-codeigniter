<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260704115500CreateAuditLogsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_07_04_115458_create_audit_logs_table')) return;
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('user_name')->nullable();
            $table->string('user_role')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('action');
            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('description');
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_07_04_115458_create_audit_logs_table')) return;
        Schema::dropIfExists('audit_logs');
    }
}
