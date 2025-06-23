<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class WorkExperience extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'practitioner_id',
        'work_modality_id',
        'nature_of_practice',
        'facility_name',
        'work_inclusive_date_from',
        'work_inclusive_date_to',
        'work_inclusive_date_to_present',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class, 'work_modality_id')->orderBy('id', 'asc');
    }
}
