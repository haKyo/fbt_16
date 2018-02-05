<?php

namespace App\Models;

use Storage;
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
        'start_date',
        'end_date',
        'price',
        'category_id',
    ];

    /**
     * [comment description]
     * @return [type] [description]
     */
    
    public function reviews()
    {
        return $this->belongsToMany(User::class, 'reviews', 'tour_id', 'user_id')->withPivot('content');
    }

    /**
     * [booking description]
     * @return [type] [description]
     */
    
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    /**
     * [category description]
     * @return [type] [description]
     */
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * [reviewsTour description]
     * @return [type] [description]
     */
    
    public function reviewTours()
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

    /**
     * [getImgPathAttribute description]
     * @return [type] [description]
     */

    public function getImagesAttribute($value)
    {
        return asset(config('setting.img_path') . '/' . $value);
    }
}
