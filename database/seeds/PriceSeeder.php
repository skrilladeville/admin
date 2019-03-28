<?php

use Illuminate\Database\Seeder;
use App\Price;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    	


    public function run()
    {
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>1,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>2,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>3,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>4,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>5,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>6,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>7,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);
        Price::create([
            'count'=>1,
            'from'=>1,
            'to'=>2,
            'price'=>100,
            'price_preset_id'=>0,
            'product_id'=>8,
            'show_on_digital'=>1,
         
            'gram_price'=>100,
            'eight_price'=>200,
            'quarter_price'=>300,
            'half_price'=>400,
            'ounce_price'=>500,
            'joint_price'=>600,
            'piece_price'=>100,
            'range_price'=>100,
        ]);

    }
}
