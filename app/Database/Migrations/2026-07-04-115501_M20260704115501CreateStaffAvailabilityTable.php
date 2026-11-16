<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20260704115501CreateStaffAvailabilityTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_07_04_115458_create_staff_availability_table')) return;
        Schema::create('staff_availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('day_of_week', [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
            ]);
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(true);
            $table->string('unit');
            $table->timestamps();

            $table->unique(['user_id', 'day_of_week', 'start_time']);
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_07_04_115458_create_staff_availability_table')) return;
        Schema::dropIfExists('staff_availability');
    }
}
