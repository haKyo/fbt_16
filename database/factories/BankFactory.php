<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bank::class, function (Faker $faker) {
    return [
        'bank' => $faker->company,
        'number_card' => $faker->creditCardNumber,
        'user_id' => App\Models\User::all()->random()->id,
    ];
});
