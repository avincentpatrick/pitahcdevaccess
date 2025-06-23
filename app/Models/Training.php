<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Training extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'practitioner_id',
        'training_modality_id',
        'title_of_training',
        'number_of_hours',
        'conducted_by',
        'certificate_obtained',
        'training_inclusive_date_from',
        'training_inclusive_date_to',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class, 'training_modality_id')->orderBy('id', 'asc');
    }
}
