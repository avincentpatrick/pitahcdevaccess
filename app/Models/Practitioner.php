<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Practitioner extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $fillable = [
        'status_type_id',
        'application_type_id',
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
        'created_by',
        'updated_by',
    ];
    
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
        return $this->belongsTo(Barangay::class, 'business_barangay_id');
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
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('last_name', 'like', $term)
                ->orWhere('first_name', 'like', $term)
                ->orWhere('middle_name', 'like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhere('residential_address', 'like', $term)
                ->orWhere('business_address', 'like', $term)
                ->orWhereHas('status_type', function ($query) use ($term) {
                    $query->where('status_type_name', 'like', $term);
                })
                ->orWhereHas('application_type', function ($query) use ($term) {
                    $query->where('application_type_name', 'like', $term);
                })
                ->orWhereHas('sex_type', function ($query) use ($term) {
                    $query->where('sex_type_name', 'like', $term);
                })
                ->orWhereHas('prefix', function ($query) use ($term) {
                    $query->where('prefix_name', 'like', $term);
                })
                ->orWhereHas('suffix', function ($query) use ($term) {
                    $query->where('suffix_name', 'like', $term);
                })
                ->orWhereHas('primary_citizenship', function ($query) use ($term) {
                    $query->where('nationality_name', 'like', $term);
                })
                ->orWhereHas('secondary_citizenship', function ($query) use ($term) {
                    $query->where('nationality_name', 'like', $term);
                })
                ->orWhereHas('residential_region', function ($query) use ($term) {
                    $query->where('region_name', 'like', $term);
                })
                ->orWhereHas('residential_province', function ($query) use ($term) {
                    $query->where('province_name', 'like', $term);
                })
                ->orWhereHas('residential_city', function ($query) use ($term) {
                    $query->where('city_name', 'like', $term);
                })
                ->orWhereHas('residential_barangay', function ($query) use ($term) {
                    $query->where('barangay_name', 'like', $term);
                })
                ->orWhereHas('business_region', function ($query) use ($term) {
                    $query->where('region_name', 'like', $term);
                })
                ->orWhereHas('business_province', function ($query) use ($term) {
                    $query->where('province_name', 'like', $term);
                })
                ->orWhereHas('business_city', function ($query) use ($term) {
                    $query->where('city_name', 'like', $term);
                })
                ->orWhereHas('business_barangay', function ($query) use ($term) {
                    $query->where('barangay_name', 'like', $term);
                })
                ->orWhereHas('user_created', function ($query) use ($term) {
                    $query->where('last_name', 'like', $term)
                        ->orWhere('first_name', 'like', $term)
                        ->orWhere('email', 'like', $term);
                })
                ->orWhereHas('user_updated', function ($query) use ($term) {
                    $query->where('last_name', 'like', $term)
                        ->orWhere('first_name', 'like', $term)
                        ->orWhere('email', 'like', $term);
                });
        });
    }
}
