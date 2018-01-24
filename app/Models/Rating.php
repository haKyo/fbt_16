<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'voted',
        'user_id',
        'tour_id',
    ];

    /**
     * [userRatings description]
     * @return [type] [description]
     */
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    /**
     * [userReviews description]
     * @return [type] [description]
     */
    
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
