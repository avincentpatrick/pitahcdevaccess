<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AvailabilityType;
use File;

class AvailabilityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AvailabilityType::truncate();
        $json = File::get("database/data/availability_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                AvailabilityType::create(array(
                    'id' => $obj->id,
                    'availability_type_name' => $obj->availability_type_name
                ));
            }
    }
}
