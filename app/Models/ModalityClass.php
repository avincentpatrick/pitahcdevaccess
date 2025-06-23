<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalityClass extends Model
{
    use HasFactory;

    protected $table = 'modality_classes';

    public function facility_type()
    {
        return $this->belongsTo(FacilityType::class, 'facility_type_id')->orderBy('id', 'asc');
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class, 'modality_id')->orderBy('id', 'asc');
    }
}
