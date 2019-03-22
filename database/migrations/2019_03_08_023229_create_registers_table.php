<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('is_active')->default(0);
            $table->string('office');
            $table->string('digital_scale_ip')->default('0.0.0.0');
            $table->string('port')->default(0);
            $table->double('opening_amount')->default(0.00);
            $table->double('cash_tenders')->default(0.00);
            $table->double('safe_drops')->default(0.00);
            $table->double('returns')->default(0.00);
            $table->double('expected_drawer')->default(0.00);
            $table->double('credit_card')->default(0.00);
            $table->double('check')->default(0.00);
            $table->double('store_credit')->default(0.00);
            $table->double('short')->default(0.00);
            $table->integer('register_type');
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
        Schema::dropIfExists('registers');
    }
}
