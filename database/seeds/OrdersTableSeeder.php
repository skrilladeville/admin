<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 5)->create()->each(function($order){
            $order->items()->saveMany(factory(App\OrderItem::class, 3)->create());
        });
    }
}
