<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260923000004CreateReferralFormOptionsTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_09_23_000004_create_referral_form_options_table')) return;
        Schema::create('referral_form_options', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // referral_type, referral_source, act_of_misconduct
            $table->string('value');
            $table->string('label');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->unique(['category', 'value']);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_09_23_000004_create_referral_form_options_table')) return;
        Schema::dropIfExists('referral_form_options');
    }
}
