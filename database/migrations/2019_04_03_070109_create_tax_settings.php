<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enable_tax');
            $table->boolean('apply_biz_tax');
            $table->boolean('prices_inclusive_tax');
            $table->unsignedInteger('tier_w/card')->nullable();
                $table->foreign('tier_w/card')->references('id')->on('tax_tiers')->onDelete('set null');
            $table->unsignedInteger('tier_18+')->nullable();
                $table->foreign('tier_18+')->references('id')->on('tax_tiers')->onDelete('set null');
            $table->unsignedInteger('tier_adult_use')->nullable();
                $table->foreign('tier_adult_use')->references('id')->on('tax_tiers')->onDelete('set null');
            $table->unsignedInteger('tier_walk_in')->nullable();
                $table->foreign('tier_walk_in')->references('id')->on('tax_tiers')->onDelete('set null');
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
        Schema::dropIfExists('tax_settings');
    }
}
