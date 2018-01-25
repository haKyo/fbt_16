<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'like',
        'likeable_id',
        'likeable_type',
        'user_id',
    ];
    
    /**
     * [likePolymorphic description]
     * @return [type] [description]
     */
    
    public function liketable()
    {
        return $this->morphTo();
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
