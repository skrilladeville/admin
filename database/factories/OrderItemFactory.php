<?php

use Faker\Generator as Faker;

$factory->define(App\OrderItem::class, function (Faker $faker) {
    return [
        // 'order_id' => $faker->numberBetween($min = 1, $max = 1),
        'product_id' => $faker->numberBetween($min = 1, $max = 1),
        'qty' => $faker->numberBetween($min = 1, $max = 4),
        'tax' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
