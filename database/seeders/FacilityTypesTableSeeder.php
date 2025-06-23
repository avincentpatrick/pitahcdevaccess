<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FacilityType;
use File;

class FacilityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacilityType::truncate();
        $json = File::get("database/data/facility_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                FacilityType::create(array(
                    'id' => $obj->id,
                    'facility_type_name' => $obj->facility_type_name
                ));
            }
    }
}
