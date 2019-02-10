<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
    return [
        'name'=> $faker->text($maxNbChars = 10), 
        'product_cat_id' => $faker->numberBetween($min = 0, $max = 0),
        'description' => $faker->text($maxNbChars = 30)
    ];
});
