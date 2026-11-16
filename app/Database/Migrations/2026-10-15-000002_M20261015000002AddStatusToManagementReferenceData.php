<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class M20261015000002AddStatusToManagementReferenceData extends Migration
{
    private const TABLES = ['colleges', 'programs', 'departments', 'referral_form_options'];

    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_15_000002_add_status_to_management_reference_data')) return;
        // active | inactive | archived. Inactive and archived items are hidden from the
        // dropdowns for new records but stay in the table, so existing records keep their names.
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->string('status', 20)->default('active')->index();
            });
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_15_000002_add_status_to_management_reference_data')) return;
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn('status');
            });
        }
    }
}
