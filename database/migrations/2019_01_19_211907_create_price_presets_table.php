<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricePresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_presets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('price_type');
            $table->boolean('is_custom_prices')->nullable();
            $table->boolean('is_dynamic_preset')->nullable();
            $table->double('gram_price')->default(0.0);
            $table->double('eight_price')->default(0.0);
            $table->double('quarter_price')->default(0.0);
            $table->double('half_price')->default(0.0);
            $table->double('ounce_price')->default(0.0);
            $table->double('joint_price')->default(0.0);
            $table->double('piece_price')->default(0.0);
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
        Schema::dropIfExists('price_presets');
    }
}
