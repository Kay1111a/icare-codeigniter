<?php

namespace App\Database\Migrations;

use App\Libraries\Bridge\SchemaMigration as Migration;
use Illuminate\Support\Facades\DB;

// Referral for Psychological Testing (QF-OSS-GCU-05) is the document header
// shown on the GCU referral that TMDU works on. Its header values were never
// seeded (the row was created on first read with only Revision No. 01), so
// TMDU saw a blank Effectivity / Ctrl No. Set the official values here.
class M20261006000001SetTmduReferralDocumentSettings extends Migration
{
    public function up(): void
    {
        if ($this->alreadyApplied('2026_10_06_000001_set_tmdu_referral_document_settings')) return;
        $values = [
            'revision_no'      => '01',
            'effectivity_date' => '2023-07-04',
            'ctrl_no_year'     => '26',
            'ctrl_no_term'     => '1',
            'updated_at'       => now(),
        ];

        $exists = DB::table('document_settings')->where('document_code', 'QF-OSS-GCU-05')->exists();

        if ($exists) {
            DB::table('document_settings')->where('document_code', 'QF-OSS-GCU-05')->update($values);
        } else {
            DB::table('document_settings')->insert([
                'document_code' => 'QF-OSS-GCU-05',
                'created_at'    => now(),
                ...$values,
            ]);
        }
    }

    public function down(): void
    {
        if ($this->alreadyApplied('2026_10_06_000001_set_tmdu_referral_document_settings')) return;
        // Intentionally left as-is: the previous state was an unset header.
    }
}
