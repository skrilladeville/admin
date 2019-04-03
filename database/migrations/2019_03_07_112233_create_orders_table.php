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
            $table->integer('order_type')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('delivery_address')->nullable();
            $table->integer('status')->nullable();
            $table->integer('fulfillment')->nullable();
            $table->text('note')->nullable();
            $table->float('shipping')->nullable();
            $table->float('sales_tax')->nullable();
            $table->float('total')->default(0.0);
            $table->float('balance')->default(0.0);
            $table->float('discount')->nullable();
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
