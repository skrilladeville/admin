<?php

use Faker\Generator as Faker;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'licence_or_registration_no'=>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'profile_patients_id'=>$faker->numberBetween($min = 1, $max = 5),
        'description' => $faker->text($maxNbChars = 30),
        'address'=> $faker->address,
        'phone'=>$faker->phoneNumber,
        'fax'=>$faker->randomNumber($nbDigits = NULL, $strict = false),  
        'email'=>$faker->email,
        'skype'=>$faker->text($maxNbChars = 20) 



    ];
});

