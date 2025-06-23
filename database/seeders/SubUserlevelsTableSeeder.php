<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubUserlevel;
use File;

class SubUserlevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubUserlevel::truncate();
        $json = File::get("database/data/sub_userlevels.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                SubUserlevel::create(array(
                    'id' => $obj->id,
                    'userlevel_id' => $obj->userlevel_id,
                    'sub_userlevel_name' => $obj->sub_userlevel_name
                ));
            }
    }
}
