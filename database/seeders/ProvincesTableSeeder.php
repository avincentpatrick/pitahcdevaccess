<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use File;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();
        $json = File::get("database/data/provinces.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Province::create(array(
                    'id' => $obj->id,
                    'region_id' => $obj->region_id,
                    'province_name' => $obj->province_name,
                    'province_name_lower' => $obj->province_name_lower,
                    'geographic_level' => $obj->geographic_level,
                    'uhc_is_id' => $obj->uhc_is_id,
                    'income_class' => $obj->income_class,
                    'population' => $obj->population
                ));
            }
    }
}
