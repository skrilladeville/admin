<?php

use App\ProfileDoctor;
use Illuminate\Database\Seeder;

class ProfileDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProfileDoctor::class, 2)->create();
    }
}
