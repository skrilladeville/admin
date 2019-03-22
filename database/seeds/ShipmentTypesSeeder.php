<?php

use Illuminate\Database\Seeder;
use App\ShipmentType;

class ShipmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentType::create([
            'type' => 'Pickup'
        ]);
        ShipmentType::create([
            'type' => 'Delivery'
        ]);
    }
}
