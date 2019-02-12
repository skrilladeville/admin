<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInProductByUnitRange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('check_in_product_qty_by_unit_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('check_in_product_id');
            $table->double('total_quantity');
            $table->double('cost_per_piece');
            $table->double('total_cost'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_in_product_qty_by_unit_ranges');
    }
}
