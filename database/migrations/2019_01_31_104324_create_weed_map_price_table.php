<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeedMapPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weed_map_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable();
            $table->double('one_g')->nullable();
            $table->double('two_g')->nullable();
            $table->double('eight_oz')->nullable();
            $table->double('four_oz')->nullable();
            $table->double('half_oz')->nullable();
            $table->double('one_oz')->nullable();
            
            $table->timestamps();
        });
    }
//     one_g:0,
//     two_g:0,
//     eight_oz:0,
//     four_oz:0,
//     half_oz:0,
//     one_oz:0,
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weed_map_prices');
    }
}
