<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');   
            $table->integer('user_id');
            $table->integer('order_type');
            $table->string('customer_type');
            $table->string('delivery_address');
            $table->integer('status');
            $table->integer('fulfillment');
            $table->text('note');
            $table->double('shipping');
            $table->double('sales_tax');
            $table->double('total');
            $table->double('balance');
            $table->double('discount');
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
        Schema::dropIfExists('orders');
    }
}
