<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
    	'bank',
    	'number_card',
    ];
    
    /**
     * [userBank description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * [pay_bank description]
     * @return [type] [description]
     */
    
    public function pay()
    {
        return $this->hasOne(Payment::class);
    }
}
