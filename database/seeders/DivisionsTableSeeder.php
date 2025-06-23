<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use File;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::truncate();
        $json = File::get("database/data/divisions.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Division::create(array(
                    'id' => $obj->id,
                    'division_name' => $obj->division_name
                ));
            }
    }
}
