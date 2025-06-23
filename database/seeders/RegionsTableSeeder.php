<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use File;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();
        $json = File::get("database/data/regions.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Region::create(array(
                    'id' => $obj->id,
                    'sequence_no' => $obj->sequence_no,
                    'region_name' => $obj->region_name,
                    'region_name_no' => $obj->region_name_no,
                    'population' => $obj->population,
                    'regional_director_name' => $obj->regional_director_name,
                    'regional_office_address' => $obj->regional_office_address,
                    'regional_director_designation' => $obj->regional_director_designation
                ));
            }
    }
}
