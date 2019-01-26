<?php

use Illuminate\Database\Seeder;

class BookingsServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BookingsServices::class, 5)->create();
    }
}
