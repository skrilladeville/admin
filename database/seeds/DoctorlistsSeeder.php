<?php

use Illuminate\Database\Seeder;
use App\Doctorlist;
use Faker\Factory as Faker;

class DoctorlistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

public function run()
{
    // create administrator
    Doctorlist::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'license_no' => 'CD15635SE28888',
        "license_expiration" => '2019-08-08'
    ]);

    // generating users for testing purposes with faker
    factory(App\Doctorlist::class, 10)->create();
}
}