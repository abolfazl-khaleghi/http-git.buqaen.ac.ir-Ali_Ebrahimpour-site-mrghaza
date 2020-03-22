<?php
/**
 * Created by ali.
 * User: ali
 */

namespace App;


use App\Models\Role;

trait RoleTrait
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name' , $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
}
