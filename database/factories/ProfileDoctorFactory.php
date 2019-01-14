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

$factory->define(App\ProfileDoctor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        //'profession' => $faker->randomElements($array = array('Medical Doctor','Medical Doctor'), $count = 1),
        'profession' => 'Medical Doctor',
        'license_no' => $faker->swiftBicNumber,
        'address_1' => $faker->streetName,
        'address_2' => $faker->streetAddress,
        'city' => $faker->city,
        'province' => $faker->stateAbbr,
        'postal_code' => $faker->postcode,
        //'clinic_name' => $faker->randomElements($array = array('Mayo Clinic','Weeders Clinic'), $count = 1),
        'clinic_name' => 'Weeders Clinic',
        'telephone' => $faker->phoneNumber,
        'extension' => $faker->numberBetween($min = 10, $max = 20),
        'health_card' => $faker->randomNumber($nbDigits = null, $strict = false),
        'emg_contact' => $faker->name,
        'emg_contact_phone' => $faker->phoneNumber,
        //'user_id' => $faker->randomElements($array = array('3', '4'), $count = 1) ,
        'user_id' => 3,
        'profile_branch_admins_id' => 2,
        'branches_id' => 1,
        'status' => 1,
    ];
});
