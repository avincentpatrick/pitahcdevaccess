<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LguType;
use File;

class LguTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LguType::truncate();
        $json = File::get("database/data/lgu_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                LguType::create(array(
                    'id' => $obj->id,
                    'lgu_type_name' => $obj->lgu_type_name,
                    'lgu_type_shortened_name' => $obj->lgu_type_shortened_name
                ));
            }
    }
}
