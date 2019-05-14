<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Closure;
use App\Capacity;
use Faker\Generator as Faker;

$factory->define(Closure::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'image' => $faker->imageUrl(1200,400),
        'price' => $faker->randomFloat(2,0,500),
        'quantity' => $faker->numberBetween(10,400),
        'order' => $faker->randomLetter,
    ];
});

$factory->define(Capacity::class, function (Faker $faker) {
    return [
        'cc' => $faker->randomElement(['10 cc','100 cc','50 cc','5 cc','40 cc','60 cc','1000 cc','300 cc','90 cc','15 cc','20 cc',]),
        'price' => $faker->randomFloat(2,0,500),
        'quantity' => $faker->numberBetween(10,400),
        'order' => $faker->randomLetter,
    ];
});
