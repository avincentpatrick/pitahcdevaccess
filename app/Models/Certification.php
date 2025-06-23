<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Certification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];
    protected $auditInclude = [
        'practitioner_id',
        'status_type_id',
        'application_type_id',
        'application_sub_type_id',
        'certification_code',
        'practitioner_certificate_file_name',
        'certificate_availability_id',
        'modality_class_id',
        'entry_date',
        'application_date',
        'expiration_date',
    ];

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class, 'practitioner_id')->orderBy('id', 'asc');
    }
    
    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')->orderBy('id', 'asc');
    }
    
    public function application_type()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id')->orderBy('id', 'asc');
    }
    
    public function application_sub_type()
    {
        return $this->belongsTo(ApplicationSubType::class, 'application_sub_type_id')->orderBy('id', 'asc');
    }

    public function modality_class()
    {
        return $this->belongsTo(ModalityClass::class, 'modality_class_id')->orderBy('id', 'asc');
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by')->orderBy('id', 'asc');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by')->orderBy('id', 'asc');
    }

    public function scopeSearch($query, $term)
    {
        $terms = collect(explode(' ', strtolower($term)))->filter(); // Split the term by spaces and convert to lowercase

        $query->where(function ($query) use ($terms) {
            foreach ($terms as $term) {
                $term = "%$term%";
                $query->where(function ($query) use ($term) {
                    $query->whereRaw('LOWER(certification_code) LIKE ?', [$term])
                        ->orWhereHas('status_type', function ($query) use ($term) {
                            $query->whereRaw('LOWER(status_type_name) LIKE ?', [$term]);
                        });
                });
            }
        });
    }

}
