<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('test_date');  
            $table->integer('lab_id');
            $table->double('cbn');
            $table->double('cbd');
            $table->double('thc');
            $table->double('sativa');
            $table->double('indica');
            $table->integer('product_id');
            $table->string('lab_mesurement')->nullable();
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
        Schema::dropIfExists('lab_results');
    }
}
