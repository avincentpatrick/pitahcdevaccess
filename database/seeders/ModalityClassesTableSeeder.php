<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModalityClass;
use File;

class ModalityClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModalityClass::truncate();
        $json = File::get("database/data/modality_classes.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                ModalityClass::create(array(
                    'id' => $obj->id,
                    'status_type_id' => $obj->status_type_id,
                    'modality_type_id' => $obj->modality_type_id,
                    'facility_type_id' => $obj->facility_type_id,
                    'modality_id' => $obj->modality_id,
                    'modality_class_code' => $obj->modality_class_code,
                    'initial_filipino_validity_years' => $obj->initial_filipino_validity_years,
                    'initial_foreign_validity_years' => $obj->initial_foreign_validity_years,
                    'renewal_filipino_validity_years' => $obj->renewal_filipino_validity_years,
                    'renewal_foreign_validity_years' => $obj->renewal_foreign_validity_years,
                    'modality_class_name' => $obj->modality_class_name
                ));
            }
    }
}
