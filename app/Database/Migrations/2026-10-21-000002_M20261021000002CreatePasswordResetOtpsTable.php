<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// One-time codes for "Forgot password". Only a hash of the code is kept, and a
// code is dropped as soon as it is used, expires, or is guessed wrong too often.
class M20261021000002CreatePasswordResetOtpsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_21_000002_create_password_reset_otps_table')) return;
        Schema::create('password_reset_otps', function (Blueprint $table) {
            $table->id();
            $table->string('type', 10);              // staff | student
            $table->string('email');
            $table->string('code_hash');
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->timestamp('expires_at');
            $table->timestamp('sent_at');
            $table->timestamps();
            $table->unique(['type', 'email']);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_21_000002_create_password_reset_otps_table')) return;
        Schema::dropIfExists('password_reset_otps');
    }
}
