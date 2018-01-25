<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListUserBooking extends Model
{
    protected $fillable = [
    	'name',
    	'phone',
    	'male',
    	'date_of_birth',
    	'address',
    	'id_munber',
    ];
    
    /**
     * [bookinglist description]
     * @return [type] [description]
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
