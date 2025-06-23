<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prefix;
use File;

class PrefixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prefix::truncate();
        $json = File::get("database/data/prefixes.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Prefix::create(array(
                    'id' => $obj->id,
                    'prefix_code' => $obj->prefix_code,
                    'prefix_name' => $obj->prefix_name
                ));
            }
    }
}
