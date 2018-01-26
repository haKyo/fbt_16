<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'amount',
    	'type',
    	'date',
    ];
    
    /**
     * [ratings description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * [bookings_pay description]
     * @return [type] [description]
     */
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * [Bank_pay description]
     */
    
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }
}
