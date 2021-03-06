<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->realText,
        'review_id' => App\Models\Review::all()->random()->id,
        'user_id' => App\Models\User::all()->random()->id,
        'tour_id'=> App\Models\Tour::all()->random()->id,    
    ];
});
