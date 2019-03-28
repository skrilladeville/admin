<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 5, $max = 20),
        'order_type' => $faker->numberBetween($min = 0, $max = 2),
        'customer_type' => $faker->randomElement($array = array('Medical w/ State Card', 
                        'Adult Use 21+', 'Medical W/ Rec 18+'), $count = 1),
        'delivery_address' => $faker->address,
        'status' => $faker->numberBetween($min = 1, $max = 14),
        'fulfillment' => $faker->numberBetween($min = 1, $max = 3),
        'note' => $faker->text,
        'shipping' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
        'sales_tax' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
        'total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'balance' => 0.00,
        'discount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20)
    ];
});
