<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role_user()
    {
        return $this->belongsTo(RoleUser::class);
    }

    public function permission()
    {
        return $this->belongsTo(PermissionRole::class);
    }
}
