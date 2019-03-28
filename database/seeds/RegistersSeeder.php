<?php

use Illuminate\Database\Seeder;
use App\Register;

class RegistersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Register::create([
            'name'      =>  'Register 1',
            'register_type' => 0,
            'office' => 'Back Office'
        ]);
        Register::create([
            'name'      =>  'Register 2',
            'register_type' => 0,
            'office' => 'Back Office'
        ]);
    }
}
