<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use File;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
        $json = File::get("database/data/countries.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Country::create(array(
                    'id' => $obj->id,
                    'alpha_2_code' => $obj->alpha_2_code,
                    'alpha_3_code' => $obj->alpha_3_code,
                    'country_name' => $obj->country_name,
                    'nationality_name' => $obj->nationality_name
                ));
            }
    }
}
