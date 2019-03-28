<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipsToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function(Blueprint $table) {
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
        
            $table->foreign('transaction_type')->references('id')->on('transaction_types')->onDelete('cascade');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['register_id']);
            $table->dropForeign(['transaction_type']);
            $table->dropForeign(['order_id']);
        });
    }
}
