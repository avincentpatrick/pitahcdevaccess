<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Practitioner extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'photo_file_name',
        'prefix_id',
        'last_name',
        'first_name',
        'middle_name',
        'suffix_id',
        'birth_date',
        'birth_place',
        'citizenship_status_type_id',
        'primary_citizenship_id',
        'secondary_citizenship_id',
        'sex_type_id',
        'landline',
        'mobile_number',
        'business_number',
        'email',
        'residential_region_id',
        'residential_province_id',
        'residential_city_id',
        'residential_barangay_id',
        'residential_address',
        'business_region_id',
        'business_province_id',
        'business_city_id',
        'business_barangay_id',
        'business_address',
    ];

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')->orderBy('id', 'asc');
    }

    public function application_type()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id')->orderBy('id', 'asc');
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

    public function region()
    {
        return $this->belongsTo(Region::class, 'residential_region_id')->orderBy('id', 'asc');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'residential_province_id')->orderBy('id', 'asc');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'residential_city_id')->orderBy('id', 'asc');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'residential_barangay_id')->orderBy('id', 'asc');
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
        $terms = collect(explode(' ', strtolower($term)))->filter(); 
    
        $query->where(function ($query) use ($terms) {
            foreach ($terms as $term) {
                $term = "%$term%";
                $query->where(function ($query) use ($term) {
                    $query->whereRaw('LOWER(last_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(first_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(middle_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(email) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(residential_address) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(business_address) LIKE ?', [$term])
                    ->orWhereHas('status_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(status_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('application_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(application_type_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('sex_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(sex_type_name) LIKE ?', [$term]);
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
