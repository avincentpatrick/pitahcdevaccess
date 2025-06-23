<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Facility extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table = 'facilities';
    protected $guarded = [];
    protected $auditInclude = [
        'status_type_id',
        'facility_name',
        'prefix_id',
        'last_name',
        'first_name',
        'middle_name',
        'suffix_id',
        'citizenship_id',
        'sex_type_id',
        'foreign_managed_status_type_id',
        'filipino_physician_prefix_id',
        'filipino_physician_last_name',
        'filipino_physician_first_name',
        'filipino_physician_middle_name',
        'filipino_physician_suffix_id',
        'filipino_physician_prc_id_number',
        'filipino_physician_prc_expiration_date',
        'landline',
        'mobile_number',
        'business_number',
        'email',
        'region_id',
        'province_id',
        'city_id',
        'barangay_id',
        'address',
    ];

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')->orderBy('id', 'asc');
    }

    public function prefix()
    {
        return $this->belongsTo(Prefix::class, 'prefix_id')->orderBy('id', 'asc');
    }

    public function suffix()
    {
        return $this->belongsTo(Suffix::class, 'suffix_id')->orderBy('id', 'asc');
    }

    public function physician_prefix()
    {
        return $this->belongsTo(Prefix::class, 'filipino_physician_prefix_id')->orderBy('id', 'asc');
    }

    public function physician_suffix()
    {
        return $this->belongsTo(Suffix::class, 'filipino_physician_suffix_id')->orderBy('id', 'asc');
    }

    public function sex_type()
    {
        return $this->belongsTo(SexType::class, 'sex_type_id')->orderBy('id', 'asc');
    }

    public function citizenship()
    {
        return $this->belongsTo(Country::class, 'citizenship_id')->orderBy('nationality_name', 'asc');
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
                    $query->whereRaw('LOWER(facility_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(address) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(email) LIKE ?', [$term])
                    ->orWhereHas('status_type', function ($query) use ($term) {
                        $query->whereRaw('LOWER(status_type_name) LIKE ?', [$term]);
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
                    ->orWhereHas('physician_prefix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(prefix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('physician_suffix', function ($query) use ($term) {
                        $query->whereRaw('LOWER(suffix_name) LIKE ?', [$term]);
                    })
                    ->orWhereHas('citizenship', function ($query) use ($term) {
                        $query->whereRaw('LOWER(nationality_name) LIKE ?', [$term]);
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
