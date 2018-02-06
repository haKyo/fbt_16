<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'date_of_birth',
        'male',
        'address',
        'phone',
        'id_number',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * [user description]
     * @return [type] [description]
     */
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * [bookings description]
     * @return [type] [description]
     */
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * [payments description]
     * @return [type] [description]
     */
    
    public function users()
    {
        return $this->belongsToMany(Review::class);
    }

    /**
     * [comment description]
     * @return [type] [description]
     */
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * [ratings description]
     * @return [type] [description]
     */
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    
    /**
     * [banks description]
     * @return [type] [description]
     */
    
    public function banks()
    {
        return $this->hasMany(UserBank::class);
    }

    /**
     * [like description]
     * @return [type] [description]
     */
    
    public function like()
    {
        return $this->hasOne(Like::class);
    }

    /**
     * [tour description]
     * @return [type] [description]
     */
    
    public function reviews()
    {
        return $this->belongsToMany(Tour::class);
    }

    /**
     * [isAdmin description]
     * @return boolean [description]
     */
    
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * [setPasswordAttribute description]
     * @param [type] $value [description]
     */
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    
    public function getMaleAttribute($male)
    {   
        $male == config('setting.gender') ? $male = config('setting.male') : $male = config('setting.female'); 

        return $this->attributes['male'] = $male;
    }
}
