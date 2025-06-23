<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;
use File;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::truncate();
        $json = File::get("database/data/offices.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Office::create(array(
                    'id' => $obj->id,
                    'office_name' => $obj->office_name
                ));
            }
    }
}
