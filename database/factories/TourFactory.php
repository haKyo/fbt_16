<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tour::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->realText,
        'images' => $faker->image('public/storage/images',400, 300, null, false) ,
        'number_user' => $faker->randomNumber(2),
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'price' => $faker->randomNumber(5),
        'category_id' => App\Models\Category::all()->random()->id,
    ];
});
