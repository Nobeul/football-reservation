<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


}
