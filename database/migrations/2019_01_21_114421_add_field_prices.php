<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->double('gram_price')->default(0.0);
            $table->double('eight_price')->default(0.0);
            $table->double('quarter_price')->default(0.0);
            $table->double('half_price')->default(0.0);
            $table->double('ounce_price')->default(0.0);
            $table->double('joint_price')->default(0.0);
            $table->double('piece_price')->default(0.0);
            $table->double('range_price')->default(0.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
        $table->dropColumn('gram_price');
        $table->dropColumn('eight_price');
        $table->dropColumn('quarter_price');
        $table->dropColumn('half_price');
        $table->dropColumn('ounce_price');
        $table->dropColumn('joint_price');
        $table->dropColumn('piece_price');
        $table->dropColumn('range_price');
        });
    }
}
