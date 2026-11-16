<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261016000001CreateEmailLogsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_16_000001_create_email_logs_table')) return;
        // One row per notification email: what was sent, to whom, and whether it
        // went through. Failed emails keep a copy of the notification so they can be retried.
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->string('recipient_email');
            $table->string('notification');                 // notification class
            $table->string('subject')->nullable();
            $table->string('status', 20)->default('sent')->index(); // sent | failed | gave_up
            $table->unsignedSmallInteger('attempts')->default(1);
            $table->text('error_message')->nullable();
            $table->longText('payload')->nullable();        // serialized notification, kept only while failed
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
            $table->index(['notifiable_type', 'notifiable_id']);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_16_000001_create_email_logs_table')) return;
        Schema::dropIfExists('email_logs');
    }
}
