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
            'branch_name'      =>  'Green Home',
            'branch_description'     =>  'Green, green grass of Home',
            'status' => 1,
        ]);
    }
}
