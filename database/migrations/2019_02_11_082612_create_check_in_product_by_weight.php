<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInProductByWeight extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_in_product_qty_by_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('check_in_product_id');
            $table->double('jar_g');
            $table->double('one_g');
            $table->double('eight_oz');
            $table->double('fourth_oz');
            $table->double('total_weight');
            $table->double('cost_per_gram');
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
        Schema::dropIfExists('check_in_product_qty_by_weights');
    }
}
