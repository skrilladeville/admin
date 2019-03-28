<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name'=>'Flower',	
            'product_cat_id'=>0,
            'description'=>'this a description'
        ]);
        ProductCategory::create([
            'name'=>'oil',	
            'product_cat_id'=>0,
            'description'=>'this a description'
        ]);
        ProductCategory::create([
            'name'=>'seeds',	
            'product_cat_id'=>0,
            'description'=>'this a description'
        ]);
        ProductCategory::create([
            'name'=>'Vape',	
            'product_cat_id'=>0,
            'description'=>'this a description'
        ]);
        ProductCategory::create([
            'name'=>'Accesories',	
            'product_cat_id'=>0,
            'description'=>'this a description'
        ]);
    }
}
