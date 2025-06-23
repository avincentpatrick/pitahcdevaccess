<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationType;
use File;

class ApplicationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationType::truncate();
        $json = File::get("database/data/application_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                ApplicationType::create(array(
                    'id' => $obj->id,
                    'application_type_name' => $obj->application_type_name
                ));
            }
    }
}
