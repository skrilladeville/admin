<?php

use Illuminate\Database\Seeder;
use App\TransactionType;

class TransactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionType::create([
            'type' => 'Open Shift'  

        ]);

        TransactionType::create([
            'type' => 'Safe Drop'
        ]);

        TransactionType::create([
            'type' => 'Sale'
        ]);
        
        TransactionType::create([
            'type' => 'Close Shift'
        ]);

        TransactionType::create([
            'type' => 'Return Cash'
        ]);

    }
}
