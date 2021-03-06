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

$factory->define(App\Survey::class, function (Faker $faker) {
    return [
        'vote' => $faker->randomElement(array('0', '1')),
        'score' => $faker->randomElement(array('1', '2', '3', '4', '5')),
        'description' => $faker->text($maxNbChars = 200),
        'comment' => $faker->text($maxNbChars = 200),
        'profile_doctors_id' => $faker->randomElement($array = array('3', '4'), $count = 1),
        'profile_patients_id' => $faker->randomElement($array = array('5', '6', '7', '8', '9', '10'), $count = 1),
    ];
});
