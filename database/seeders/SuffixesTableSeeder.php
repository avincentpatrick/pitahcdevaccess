<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suffix;
use File;

class SuffixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suffix::truncate();
        $json = File::get("database/data/suffixes.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Suffix::create(array(
                    'id' => $obj->id,
                    'suffix_code' => $obj->suffix_code,
                    'suffix_name' => $obj->suffix_name
                ));
            }
    }
}
