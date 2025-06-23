<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModalityType;
use File;

class ModalityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModalityType::truncate();
        $json = File::get("database/data/modality_types.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                ModalityType::create(array(
                    'id' => $obj->id,
                    'modality_type_name' => $obj->modality_type_name
                ));
            }
    }
}
