<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261020000003CreateCalendarEntriesTable extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_20_000003_create_calendar_entries_table')) return;
        if (Schema::hasTable('calendar_entries')) return;
        Schema::create('calendar_entries', function (Blueprint $table) {
            $table->id();
            $table->date('entry_date')->index();
            $table->string('name', 120);
            $table->string('type', 30);                       // holiday | class_suspension | office_closed
            $table->string('status', 20)->default('active');  // active | archived
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_20_000003_create_calendar_entries_table')) return;
        Schema::dropIfExists('calendar_entries');
    }
}
