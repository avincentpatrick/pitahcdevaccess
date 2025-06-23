<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Response;
use File;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Response::truncate();
        $json = File::get("database/data/responses.json");
        $data = json_decode($json);
            foreach ($data as $obj) 
            {
                Response::create(array(
                    'id' => $obj->id,
                    'response_name' => $obj->response_name
                ));
            }
    }
}
