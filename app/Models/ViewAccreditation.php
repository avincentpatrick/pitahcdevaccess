<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewAccreditation extends Model
{
    use HasFactory;

    protected $table = 'view_accreditations';

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'fid')->orderBy('id', 'asc');
    }

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class, 'aid')->orderBy('id', 'asc');
    }

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')->orderBy('id', 'asc');
    }

    public function facility_type()
    {
        return $this->belongsTo(FacilityType::class, 'facility_type_id')->orderBy('id', 'asc');
    }
    
    public function modality()
    {
        return $this->belongsTo(Modality::class, 'modality_id')->orderBy('id', 'asc');
    }
    
    public function modality_class()
    {
        return $this->belongsTo(ModalityClass::class, 'modality_class_id')->orderBy('id', 'asc');
    }

    public function prefix()
    {
        return $this->belongsTo(Prefix::class, 'prefix_id')->orderBy('id', 'asc');
    }

    public function suffix()
    {
        return $this->belongsTo(Suffix::class, 'suffix_id')->orderBy('id', 'asc');
    }

    public function citizenship()
    {
        return $this->belongsTo(Country::class, 'citizenship_id')->orderBy('nationality_name', 'asc');
    }

    public function sex_type()
    {
        return $this->belongsTo(SexType::class, 'sex_type_id')->orderBy('id', 'asc');
    }

    public function filipino_physician_prefix()
    {
        return $this->belongsTo(Prefix::class, 'filipino_physician_prefix_id')->orderBy('id', 'asc');
    }

    public function filipino_physician_suffix()
    {
        return $this->belongsTo(Suffix::class, 'filipino_physician_suffix_id')->orderBy('id', 'asc');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->orderBy('id', 'asc');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->orderBy('id', 'asc');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->orderBy('id', 'asc');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id')->orderBy('id', 'asc');
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
                    $query->whereRaw('LOWER(aid) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(fid) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(accreditation_code) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(facility_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(last_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(first_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(middle_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(filipino_physician_last_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(filipino_physician_first_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(filipino_physician_middle_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(filipino_physician_prc_id_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(landline) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(mobile_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(business_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(email) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(address) LIKE ?', [$term])
                    ->orWhereHas('status_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(status_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('facility_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(facility_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('modality', function ($query) use ($term) {
                        $query->whereRaw('LOWER(modality_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('modality_class', function ($query) use ($term) {
                        $query->whereRaw('LOWER(modality_class_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('prefix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(prefix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('suffix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(suffix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('citizenship', function ($query) use ($term) {
                        $query->whereRaw('LOWER(nationality_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('sex_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(sex_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('filipino_physician_prefix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(prefix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('filipino_physician_suffix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(suffix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('region', function ($query) use ($term) {
                        $query->whereRaw('LOWER(region_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('province', function ($query) use ($term) {
                        $query->whereRaw('LOWER(province_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('city', function ($query) use ($term) {
                        $query->whereRaw('LOWER(city_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('barangay', function ($query) use ($term) {
                        $query->whereRaw('LOWER(barangay_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('user_created', function ($query) use ($term) {
                        $query->whereRaw('LOWER(last_name) LIKE ?', [$term])
                            ->orWhereRaw('LOWER(first_name) LIKE ?', [$term])
                            ->orWhereRaw('LOWER(email) LIKE ?', [$term]);
                    })
                    ->orWhereHas('user_updated', function ($query) use ($term) {
                        $query->whereRaw('LOWER(last_name) LIKE ?', [$term])
                            ->orWhereRaw('LOWER(first_name) LIKE ?', [$term])
                            ->orWhereRaw('LOWER(email) LIKE ?', [$term]);
                    });
                });
            }
        });
    }
}
