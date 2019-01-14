<?php

use App\ProfileAdmin;
use Illuminate\Database\Seeder;

class ProfileAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileAdmin::create([
                    'first_name'      =>  'Primie',
                    'last_name'      =>  'Cegnar',
                    'user_id'     =>  1,
                    'status'     =>  1,
                ]);
    }
}
