<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20141012100000CreatePasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ($this->alreadyApplied('2014_10_12_100000_create_password_reset_tokens_table')) return;
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2014_10_12_100000_create_password_reset_tokens_table')) return;
        Schema::dropIfExists('password_reset_tokens');
    }
}
