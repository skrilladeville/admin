<?php

use Illuminate\Database\Seeder;

class BookingsServiceProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\BookingsServiceProviders::class, 5)->create();
        App\BookingsServiceProviders::create([
           'profile_doctors_id' => 3
        ]);

        App\BookingsServiceProviders::create([
            'profile_doctors_id' => 4
        ]);
    }
}
