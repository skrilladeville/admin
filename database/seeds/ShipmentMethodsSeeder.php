<?php

use Illuminate\Database\Seeder;
use App\ShipmentMethod;

class ShipmentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentMethod::create([
            'type' => rand (1, 2),
            'method' => 'Shipment Method 1'
        ]);
        ShipmentMethod::create([
            'type' => rand (1, 2),
            'method' => 'Shipment Method 2'
        ]);
    }
}
