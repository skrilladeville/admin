<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('count')->default(0);
            $table->double('from')->default(0.0);
            $table->double('to')->default(0.0);
            $table->double('price')->default(0.0);
            $table->integer('price_preset_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->boolean('show_on_digital')->default(true);
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
        Schema::dropIfExists('prices');
    }
}
