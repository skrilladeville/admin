<?php

$factory->define(App\Doctorlist::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "license_no" => $faker->sentence,
        "license_expiration" => $faker->date("Y-m-d", $max = 'now'),
    ];
});

          