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

$factory->define(App\BookingsServices::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array('Test Service 1', 
        'Test Service 2', 'Test Service 3','Test Service 4'), $count = 1),
        'description' => $faker->text($maxNbChars = 200),
        'duration' => $faker->numberBetween($min = 20, $max = 100),
        'bookings_service_providers_id' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
