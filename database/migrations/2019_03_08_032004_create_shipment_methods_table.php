<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type');
            $table->string('method');
            $table->double('charge')->default('0.00');
            $table->double('min_amount')->default('0.00');
            $table->double('free_after')->default('0.00');    
            $table->time('start_time')->default('0:00');
            $table->time('end_time')->default('0:00');
            $table->tinyInteger('is_active')->default('0');
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
        Schema::dropIfExists('shipment_methods');
    }
}
