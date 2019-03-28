<?php

use Illuminate\Database\Seeder;
use App\Shipment;
 
class ShipmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Shipment::class, 5)->create();
        Shipment::create([
            'order_id' => 6,
            'shipment_method' => 2,
            'status' => 0
        ]);

        Shipment::create([
            'order_id' => 1,
            'shipment_method' => 2,
            'status' => 1
        ]);

        Shipment::create([
            'order_id' => 2,
            'shipment_method' => 1,
            'status' => 3
        ]);

        Shipment::create([
            'order_id' => 4,
            'shipment_method' => 1,
            'status' => 0
        ]);

        Shipment::create([
            'order_id' => 5,
            'shipment_method' => 1,
            'status' => 2
        ]);

        Shipment::create([
            'order_id' => 3,
            'shipment_method' => 1,
            'status' => 0
        ]);
    }
}
