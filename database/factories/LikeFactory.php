<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Like::class, function (Faker $faker) {
    return [
        'like' => $faker->numberBetween(1, 10),
        'likeable_id' => $faker->numberBetween(1, 11),
        'likeable_type' => $faker->randomNumber(5),
        'user_id' => App\Models\User::all()->random()->id,
    ];
});
