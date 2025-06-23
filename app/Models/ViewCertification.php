<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCertification extends Model
{
    use HasFactory;

    protected $table = 'view_certifications';

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class, 'pid')->orderBy('id', 'asc');
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'cid')->orderBy('id', 'asc');
    }

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')->orderBy('id', 'asc');
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

    public function primary_citizenship()
    {
        return $this->belongsTo(Country::class, 'primary_citizenship_id')->orderBy('nationality_name', 'asc');
    }

    public function secondary_citizenship()
    {
        return $this->belongsTo(Country::class, 'secondary_citizenship_id')->orderBy('id', 'asc');
    }

    public function sex_type()
    {
        return $this->belongsTo(SexType::class, 'sex_type_id')->orderBy('id', 'asc');
    }

    public function residential_region()
    {
        return $this->belongsTo(Region::class, 'residential_region_id')->orderBy('id', 'asc');
    }

    public function residential_province()
    {
        return $this->belongsTo(Province::class, 'residential_province_id')->orderBy('id', 'asc');
    }

    public function residential_city()
    {
        return $this->belongsTo(City::class, 'residential_city_id')->orderBy('id', 'asc');
    }

    public function residential_barangay()
    {
        return $this->belongsTo(Barangay::class, 'residential_barangay_id')->orderBy('id', 'asc');
    }

    public function business_region()
    {
        return $this->belongsTo(Region::class, 'business_region_id')->orderBy('id', 'asc');
    }

    public function business_province()
    {
        return $this->belongsTo(Province::class, 'business_province_id')->orderBy('id', 'asc');
    }

    public function business_city()
    {
        return $this->belongsTo(City::class, 'business_city_id')->orderBy('id', 'asc');
    }

    public function business_barangay()
    {
        return $this->belongsTo(Barangay::class, 'business_barangay_id')->orderBy('id', 'asc');
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
                    $query->whereRaw('LOWER(cid) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(pid) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(certification_code) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(last_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(first_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(middle_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(landline) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(mobile_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(business_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(email) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(residential_address) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(business_address) LIKE ?', [$term])
                    ->orWhereHas('status_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(status_type_name) LIKE ?', [$term]);
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
                    ->orWhereHas('primary_citizenship', function ($query) use ($term) {
                        $query->whereRaw('LOWER(nationality_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('secondary_citizenship', function ($query) use ($term) {
                        $query->whereRaw('LOWER(nationality_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('sex_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(sex_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('residential_region', function ($query) use ($term) {
                        $query->whereRaw('LOWER(region_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('residential_province', function ($query) use ($term) {
                        $query->whereRaw('LOWER(province_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('residential_city', function ($query) use ($term) {
                        $query->whereRaw('LOWER(city_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('residential_barangay', function ($query) use ($term) {
                        $query->whereRaw('LOWER(barangay_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('business_region', function ($query) use ($term) {
                        $query->whereRaw('LOWER(region_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('business_province', function ($query) use ($term) {
                        $query->whereRaw('LOWER(province_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('business_city', function ($query) use ($term) {
                        $query->whereRaw('LOWER(city_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('business_barangay', function ($query) use ($term) {
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
