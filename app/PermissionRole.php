<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }
}
