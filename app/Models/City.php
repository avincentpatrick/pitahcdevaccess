<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->orderBy('region_name', 'asc');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->orderBy('province_name', 'asc');
    }
}
