<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'content',
    	'parrent_id',
        'user_id',
        'review_id',
    ];

    /**
     * [comment description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * [review description]
     * @return [type] [description]
     */
    
    public function commentReview()
    {
        return $this->belongsTo(Review::class);
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
