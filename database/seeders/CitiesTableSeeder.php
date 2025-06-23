<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use File;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        $json = File::get("database/data/cities.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                City::create(array(
                    'id' => $obj->id,
                    'region_id' => $obj->region_id,
                    'province_id' => $obj->province_id,
                    'city_name' => $obj->city_name,
                    'city_name_lower' => $obj->city_name_lower,
                    'geographic_level' => $obj->geographic_level,
                    'uhc_is_id' => $obj->uhc_is_id,
                    'city_class' => $obj->city_class,
                    'uhc_class' => $obj->uhc_class,
                    'income_class' => $obj->income_class,
                    'polulation' => $obj->polulation
                ));
            }
    }
}
