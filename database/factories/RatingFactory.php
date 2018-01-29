<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Rating::class, function (Faker $faker) {
    return [
        'voted' => $faker->numberBetween(1, 10),
        'user_id' => App\Models\User::all()->random()->id,
        'tour_id'=> App\Models\Tour::all()->random()->id,
    ];
});
