<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'register_id' => $faker->numberBetween($min = 1, $max = 2),
        'transaction_type'=> $faker->numberBetween($min = 1, $max = 5),
        'order_id' => $faker->numberBetween($min = 1, $max = 5),
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100)
    ];
});
