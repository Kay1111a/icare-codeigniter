<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20141012000000CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
        if ($this->alreadyApplied('2014_10_12_000000_create_users_table')) return;
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('employee_id')->unique()->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->enum('role', [
            'admin',
            'gcu_staff',
            'sdu_head',
            'tmdu_staff',
            'faculty',
            'dean_secretary',
        ])->default('faculty');
        $table->string('unit')->nullable();
        $table->string('college')->nullable();
        $table->string('department')->nullable();
        $table->string('contact_number')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamp('last_login_at')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->alreadyApplied('2014_10_12_000000_create_users_table')) return;
        Schema::dropIfExists('users');
    }
}
