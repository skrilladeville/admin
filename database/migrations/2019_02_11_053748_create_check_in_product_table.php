<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_in_products', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('branch_id');
            $table->integer('branch_id');
            $table->string('batch_id')->nullable();
            $table->string('date');
            $table->string('uid')->nullable();
            $table->boolean('has_lab_results');
            $table->string('harvest_date')->nullable();
            $table->decimal('total_cost', 12, 2);
            $table->string('note');
            $table->increments('id');
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
        Schema::dropIfExists('check_in_products');
    }
}
