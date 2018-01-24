<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
    protected $fillable = [
        'title',
        'description',
        'images',
        'number_user',
        'start_date ',
        'end_date',
        'price',
    ];

    /**
     * [comment description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * [ description]
     * @return [type] [description]
     */
    
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * [tourCat description]
     * @return [type] [description]
     */
    
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * [reviewsTour description]
     * @return [type] [description]
     */
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * [ratingTour description]
     * @return [type] [description]
     */
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
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
