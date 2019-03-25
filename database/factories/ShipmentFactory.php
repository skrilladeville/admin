<?php

use Faker\Generator as Faker;

$factory->define(App\Shipment::class, function (Faker $faker) {
    return [
        'order_id' => $faker->unique()->numberBetween(1, 11),
        'shipment_method' => $faker->numberBetween($min = 1, $max = 2),
        'status' => $faker->numberBetween($min = 0, $max = 3)
    ];
});
