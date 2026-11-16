<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Reconstructed to match this project's live database history - Laravel's
// standard notifications table, used by Notification::route('database', ...).
class M20260913000000CreateNotificationsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_13_000000_create_notifications_table')) return;
        if (Schema::hasTable('notifications')) {
            return;
        }

        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_13_000000_create_notifications_table')) return;
        Schema::dropIfExists('notifications');
    }
}
