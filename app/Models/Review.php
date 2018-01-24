<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    	'content',
    ];

    /**
     * [userReviews description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * [tourReviews description]
     * @return [type] [description]
     */
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * [Comments description]
     * @return [type] [description]
     */
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * [like description]
     * @return [type] [description]
     */
    
    public function likeable()
    {
        return $this->morphMany(Like::class, 'likeable_id');
    }
}
