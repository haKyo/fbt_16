<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'content' => $faker->realText,
        'user_id' => App\Models\User::all()->random()->id,
        'tour_id' => App\Models\Tour::all()->random()->id,
    ];
});
