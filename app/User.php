<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Nikolag\Square\Traits\HasCustomers;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;
    use HasCustomers;

    protected $appends = ['role', 'permission'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile()
    {
        return $this->hasOne(ProfileAdmin::class);
    }

    public function getRoleAttribute()
    {
        return $this->getRoleNames();
    }

    public function getPermissionAttribute()
    {
        $list =  array();
        $permissions = $this->getAllPermissions();

        for ($i = 0; $i < count($permissions); $i++) {
            $list[$i] = $permissions[$i]['name'];
        }

        return $list;
    }

    public function getNameAttribute()
    {
        return $this->profile();
    }
}
