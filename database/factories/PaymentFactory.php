<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Payment::class, function (Faker $faker) {
    return [
        'amount' => $faker->company,
        'type' => $faker->creditCardType,
        'date' => $faker->date,
        'booking_id' => App\Models\Booking::all()->random()->id,
        'user_id' => App\Models\User::all()->random()->id,
        'bank_id' => App\Models\Bank::all()->random()->id,
    ];
});
