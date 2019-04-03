<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'branch_name'      =>  'Indica Online',
            'branch_description'     =>  'Green, green grass of Home',
            'status' => 1,
        ]);
        Branch::create([
            'branch_name'      =>  'Billing',
            'branch_description'     =>  'Green, green grass of Home',
            'status' => 1,
        ]);
        Branch::create([
            'branch_name'      =>  'Amsterdam Gardens',
            'branch_description'     =>  'Green, green grass of Home',
            'status' => 1,
        ]);
  
        Branch::create([
            'branch_name'      =>  'Medibook',
            'branch_description'     =>  'Green, green grass of Home',
            'status' => 1,
        ]);

    }
}
