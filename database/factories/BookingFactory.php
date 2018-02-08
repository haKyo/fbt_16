<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Booking::class, function (Faker $faker) {
    return [
        'status' => false,
        'depart_day' => $faker->date,
        'user_id' => App\Models\User::all()->unique()->random()->id,
        'tour_id' => App\Models\Tour::all()->random()->id,
    ];
});
