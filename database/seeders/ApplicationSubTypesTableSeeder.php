<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationSubType;
use File;

class ApplicationSubTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationSubType::truncate();
        $json = File::get("database/data/application_sub_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                ApplicationSubType::create(array(
                    'id' => $obj->id,
                    'application_sub_type_name' => $obj->application_sub_type_name
                ));
            }
    }
}
