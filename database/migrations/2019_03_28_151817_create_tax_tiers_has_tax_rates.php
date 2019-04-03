<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxTiersHasTaxRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_tiers_has_tax_rates', function (Blueprint $table) {
            $table->unsignedInteger('tax_tier_id');
                $table->foreign('tax_tier_id')->references('id')->on('tax_tiers')->onDelete('cascade');
            $table->unsignedInteger('tax_rate_id');
                $table->foreign('tax_rate_id')->references('id')->on('tax_rates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_tiers_has_tax_rates');
    }
}
