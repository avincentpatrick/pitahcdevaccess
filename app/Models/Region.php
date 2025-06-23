<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function province(){
        return $this->hasMany(Province::class, "region_id", "id")->orderBy('province_name', 'asc');;
    }
}
