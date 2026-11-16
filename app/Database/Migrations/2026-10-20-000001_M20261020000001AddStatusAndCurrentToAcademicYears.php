<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class M20261020000001AddStatusAndCurrentToAcademicYears extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_20_000001_add_status_and_current_to_academic_years')) return;
        Schema::table('academic_years', function (Blueprint $table) {
            $table->string('status')->default('active')->after('midyear_end');
            $table->boolean('is_current')->default(false)->after('status');
        });

        // Mark the year that today falls in (or else the latest one that has started) as the current term.
        $today = now()->toDateString();
        $row = DB::table('academic_years')->where('year_start', '<=', $today)->where('year_end', '>=', $today)->first()
            ?: DB::table('academic_years')->where('year_start', '<=', $today)->orderByDesc('year_start')->first()
            ?: DB::table('academic_years')->orderByDesc('year_start')->first();
        if ($row) {
            DB::table('academic_years')->where('id', $row->id)->update(['is_current' => true]);
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_20_000001_add_status_and_current_to_academic_years')) return;
        Schema::table('academic_years', function (Blueprint $table) {
            $table->dropColumn(['status', 'is_current']);
        });
    }
}
