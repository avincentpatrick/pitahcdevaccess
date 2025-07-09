<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable, MustVerifyEmail
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'userlevel_id',
        'office_id',
        'division_id',
        'status_type_id',
        'updated_by',
    ];

    protected $auditInclude = [
        'last_name',
        'first_name',
        'email',
        'password',
        'userlevel_id',
        'office_id',
        'division_id',
        'status_type_id',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userlevel()
    {
        return $this->belongsTo(Userlevel::class, 'userlevel_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->Where('last_name', 'like', $term)
                ->orWhere('first_name', 'like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhereHas('userlevel', function ($query) use ($term) {
                    $query->where('userlevel_name', 'like', $term);
                })
                ->orWhereHas('office', function ($query) use ($term) {
                    $query->where('office_name', 'like', $term);
                })
                ->orWhereHas('division', function ($query) use ($term) {
                    $query->where('division_name', 'like', $term);
                })
                ->orWhereHas('status_type', function ($query) use ($term) {
                    $query->where('status_type_name', 'like', $term);
                })
                ->orWhereHas('user_updated', function ($query) use ($term) {
                    $query->where('last_name', 'like', $term)
                        ->orWhere('first_name', 'like', $term)
                        ->orWhere('email', 'like', $term);
                });
        });
    }
}
