<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Price;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name'=>'Product 1',
            'symbol'=>'232',
            'sku'=>'325231',
            'image'=>'image1.png',
            'product_category_id'=>1,
            'strain'=>'Indica',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Weight'
        ]);

        
        Product::create([
            'name'=>'Product 2',
            'symbol'=>'232',
            'sku'=>'325232',
            'image'=>'image2.png',
            'product_category_id'=>2,
            'strain'=>'Indica',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Weight'
        ]);
        
        Product::create([
            'name'=>'Product 3',
            'symbol'=>'232',
            'sku'=>'325233',
            'product_category_id'=>3,
            'strain'=>'Indica',
            'image'=>'image3.png',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Weight Range'
        ]);
        
        Product::create([
            'name'=>'Product 4',
            'symbol'=>'232',
            'sku'=>'325234',
            'product_category_id'=>4,
            'strain'=>'Indica',
            'image'=>'image3.png',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Per Unit'
        ]);
        
        Product::create([
            'name'=>'Product 5',
            'symbol'=>'232',
            'sku'=>'325235',
            'image'=>'image4.png',
            'product_category_id'=>5,
            'strain'=>'Indica',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Per Unit Range'
        ]);
        
        Product::create([
            'name'=>'Product 6',
            'symbol'=>'232',
            'sku'=>'325236',
            'product_category_id'=>2,
            'strain'=>'Indica',
            'image'=>'image5.png',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Per Unit'
        ]);
        
        Product::create([
            'name'=>'Product 7',
            'symbol'=>'232',
            'sku'=>'325237',
            'product_category_id'=>1,
            'strain'=>'Indica',
            'image'=>'image1.png',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Weight Range'
        ]);
        
        Product::create([
            'name'=>'Product 8',
            'symbol'=>'232',
            'sku'=>'325238',
            'product_category_id'=>1,
            'strain'=>'Indica',
            'image'=>'image2.png',
            'is_marijuana'=>1,
            'product_type_id'=>2,
            'is_each'=>0,
            'net_weight'=>2,
            'is_self_distributed'=>0,
            'is_lab_results'=>0,
            'is_show_on_weedmaps'=>1,
            'is_show_on_potify'=>0,
            'is_print_label'=>0,
            'description'=>'this is a description of the product',
            'price_measurement'=>'Weight'
        ]);
        
    }
}
