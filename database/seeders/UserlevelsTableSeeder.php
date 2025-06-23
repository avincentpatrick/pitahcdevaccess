<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Userlevel;
use File;

class UserlevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Userlevel::truncate();
        $json = File::get("database/data/userlevels.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Userlevel::create(array(
                    'id' => $obj->id,
                    'userlevel_name' => $obj->userlevel_name,
                ));
            }
    }
}
