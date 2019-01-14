<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\BookingsServiceProviders::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'home_phone' => $faker->phoneNumber,
        'cell_phone' => $faker->phoneNumber,
        'health_card' => $faker->randomNumber($nbDigits = null, $strict = false),
        'emg_contact' => $faker->text($maxNbChars = 200),
        'emg_contact_phone' => $faker->phoneNumber,
        'user_id' => $faker->numberBetween($min = 5, $max = 20),
        'profile_doctors_id' => $faker->randomElement($array = array('3', '4'), $count = 1),
        'branches_id' => 1,
        'status' => 1,
    ];
});
