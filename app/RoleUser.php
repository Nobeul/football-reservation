<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
