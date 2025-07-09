<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function download($id)
    {
        $data = Practitioner::where('id', $id)->firstOrFail();
        $filepath = storage_path("app/{$data->photo_file_name}");

        if (!Storage::exists($data->photo_file_name)) {
            abort(404);
        }

        return response()->download($filepath);
    }
}
