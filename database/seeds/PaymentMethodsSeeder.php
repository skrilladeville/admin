<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'method' => 'Cash'
        ]);
        PaymentMethod::create([
            'method' => 'Credit Card'
        ]);
        PaymentMethod::create([
            'method' => 'Check'
        ]);
        PaymentMethod::create([
            'method' => 'CC Terminal'
        ]);
    }
}
