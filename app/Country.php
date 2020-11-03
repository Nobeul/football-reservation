<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
