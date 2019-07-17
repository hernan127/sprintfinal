<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(5, 1000),
        'stock' => $faker->numberBetween(0, 30),
    ];
});
