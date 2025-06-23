<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modality;
use File;

class ModalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modality::truncate();
        $json = File::get("database/data/modalities.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Modality::create(array(
                    'id' => $obj->id,
                    'modality_name' => $obj->modality_name
                ));
            }
    }
}
