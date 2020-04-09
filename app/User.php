<?php

namespace App;

use App\Models\Member;
use App\Models\Role;
use App\Models\Servant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,RoleTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','sex', 'password','role','mobile','enabled','phone','active_code','address',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function servant()
    {
        return $this->hasOne(Servant::class);
    }

}
