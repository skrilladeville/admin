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

$factory->define(App\Bookings::class, function (Faker $faker) {
    return [
        'book_datetime' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'start_datetime' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'end_datetime' =>$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'notes' => $faker->text($maxNbChars = 200),
        'status' => 1,
        'user_id' => $faker->numberBetween($min = 5, $max = 7),
        'bookings_services_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});
