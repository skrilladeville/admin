<?php

use Faker\Generator as Faker;

$factory->define(App\Prescription::class, function (Faker $faker) {
    return [
        'profile_doctors_id' => $faker->randomElement($array = array('3', '4'), $count = 1),
        'profile_patients_id' => $faker->numberBetween($min = 5, $max = 20),
        'directions' => $faker->text($maxNbChars = 200),
        'doctor_signature' => $faker->text($maxNbChars = 200),
        'doctor_initial' => str_random(2),
        'control_no' => $faker->numberBetween($min = 20, $max = 500),
        'status' => 1, 
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});
