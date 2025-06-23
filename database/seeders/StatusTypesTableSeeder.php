<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusType;
use File;

class StatusTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusType::truncate();
        $json = File::get("database/data/status_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                StatusType::create(array(
                    'id' => $obj->id,
                    'status_type_name' => $obj->status_type_name
                ));
            }
    }
}
