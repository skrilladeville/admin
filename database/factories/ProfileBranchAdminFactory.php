<?php

use Faker\Generator as Faker;

$factory->define(App\ProfileBranchAdmin::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'branch_id' => 1,
        'user_id' => 2,
        'status' => 1,
    ];
});
