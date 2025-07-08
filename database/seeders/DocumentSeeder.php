<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            [
                'status_type_id' => 1,
                'document_reference_code' => '2025-001',
                'document_type_id' => 1, // PITAHC Order
                'document_title' => 'Official PITAHC Order on New Herbal Medicine Guidelines',
                'file_path' => 'issuances/dummy.pdf',
                'office_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_type_id' => 1,
                'document_reference_code' => '2025-002',
                'document_type_id' => 2, // PITAHC Personnel Order
                'document_title' => 'Public Advisory on Seasonal Health Concerns',
                'file_path' => 'issuances/dummy.pdf',
                'office_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_type_id' => 1,
                'document_reference_code' => '2025-003',
                'document_type_id' => 3, // PITAHC Memorandum
                'document_title' => 'Internal Memorandum for Upcoming Staff Training',
                'file_path' => 'issuances/dummy.pdf',
                'office_id' => 2,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_type_id' => 1,
                'document_reference_code' => '2025-004',
                'document_type_id' => 4, // PITAHC Memorandum Circular
                'document_title' => 'Order for the Establishment of a New Research Division',
                'file_path' => 'issuances/dummy.pdf',
                'office_id' => 3,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
