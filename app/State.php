<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
