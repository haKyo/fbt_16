<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    	'status',
    	'date',
    	'depart_day',
    ];

    /**
     * [payments description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    
    public function payament()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * [tours description]
     * @return [type] [description]
     */
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    
    /**
     * [listBooking description]
     * @return [type] [description]
     */
    
    public function listBooking()
    {
        return $this->belongsTo(ListUserBooking::class);
    }
}
