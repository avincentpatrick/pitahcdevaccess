<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barangay;
use File;

class BarangaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barangay::truncate();
        $json = File::get("database/data/barangays.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Barangay::create(array(
                    'id' => $obj->id,
                    'region_id' => $obj->region_id,
                    'province_id' => $obj->province_id,
                    'city_id' => $obj->city_id,
                    'barangay_name' => $obj->barangay_name,
                    'class' => $obj->class,
                    'population' => $obj->population
                ));
            }
    }
}
