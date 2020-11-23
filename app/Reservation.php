<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const PAYMENT_COMPLETED = 1;
    const PAYMENT_PENDING = 0;

    /**
     * @var string
     */
    protected $table = 'reservations';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = ['transaction_id', 'amount', 'payment_status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fields()
    {
        return $this->belongsTo(Field::class);
    }

}
