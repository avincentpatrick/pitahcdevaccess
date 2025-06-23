<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->orderBy('id', 'asc');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->orderBy('province_name', 'asc');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->orderBy('city_name', 'asc');
    }
}
