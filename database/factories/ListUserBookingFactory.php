<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ListUserBooking::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'male' => false,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->date,
        'address' => $faker->address,
        'id_number' => $faker->randomNumber(5),
        'booking_id' => App\Models\Booking::all()->random()->id,
    ];
});
