<?php

use App\ProfileBranchAdmin;
use Illuminate\Database\Seeder;

class ProfileBranchAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileBranchAdmin::create([
            'first_name'      =>  'John',
            'last_name'      =>  'Doe',
            'branches_id'      =>  1,
            'user_id'      =>  2,
            'status'      =>  1,
        ]);
    }
}
