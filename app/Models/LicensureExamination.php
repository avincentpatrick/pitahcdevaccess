<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class LicensureExamination extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'practitioner_id',
        'nature_of_licensure_exam',
        'date_taken',
    ];
}
