<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fields()
    {
        return $this->belongsTo(Field::class);
    }

}
