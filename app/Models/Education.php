<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Education extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    
    protected $table = 'educations';
    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'practitioner_id',
        'highest_educational_attainment',
        'school_name',
        'school_inclusive_date_from',
        'school_inclusive_date_to',
        'school_inclusive_date_to_present',
    ];
}
