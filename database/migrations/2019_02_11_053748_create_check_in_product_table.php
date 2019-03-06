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
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('branch_id');
            $table->integer('vendor_id');
            $table->string('batch_id')->nullable();
            $table->string('date');
            $table->string('uid')->nullable();
            $table->boolean('has_lab_results');
            $table->string('harvest_date')->nullable();
            $table->double('jar_g')->nullable();
            $table->double('one_g')->nullable();
            $table->double('eight_oz')->nullable();
            $table->double('fourth_oz')->nullable();
            $table->double('half_oz')->nullable();
            $table->double('one_oz')->nullable();
            $table->double('total_weight')->nullable();
            $table->double('cost_per_gram')->nullable();
            $table->double('total_quantity')->nullable();
            $table->double('cost_per_piece')->nullable();
            $table->decimal('total_cost', 12, 2);
            $table->string('note')->nullable();
            $table->integer('user_id')->nullable();
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
