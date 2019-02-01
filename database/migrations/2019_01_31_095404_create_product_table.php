<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol');
            $table->string('sku');
            $table->integer('category_id');
            $table->string('strain');
            $table->boolean('is_marijuana');
            $table->string('image')->nullable(); 
            $table->integer('product_type_id')->nullable();
            $table->boolean('is_each');
            $table->double('net_weight')->nullable();
            $table->boolean('is_self_distributed');
            $table->boolean('is_lab_results');
            $table->boolean('is_show_on_weedmaps');
            $table->boolean('is_show_on_potify');
            $table->boolean('is_print_label');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
// weed_map_price:{
//     one_g:0,
//     two_g:0,
//     eight_oz:0,
//     four_oz:0,
//     half_oz:0,
//     one_oz:0,
//     },

//     formLab:{
//     lab_id:null,
//     cbn:'',
//     cbd:'',
//     thc:'',
//     sativa:'',
//     indica:'',
//     lab_mesurement:''
//     },


//     form:{
//     strain: 'None',
//      is_marijuana:true,
//      product_type:'',
//      category_id:'',
//      is_self_distributed:false,
//     is_lab_results:false,
//     lab_mesurement:'',
//     is_show_on_weedmaps:false,
//     is_show_on_potify:false,
//     is_print_label:true,
  
//     tags:[],
//     description:'',
//      prices:[{
//         from:0,
//         to:0,
//         price_preset_id:0,
//         count:0,
//         range_price:0,
//         piece_price:0,
//         gram_price:0,
//         eight_price:0,
//         quarter_price:0,
//         half_price:0,
//         ounce_price:0,
//         joint_price:0,
//         show_on_digital:true
//             }],       
//     },

