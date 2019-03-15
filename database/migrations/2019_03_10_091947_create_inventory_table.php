<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('inventories')) {
            Schema::create('inventories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->nullable();
                $table->integer('branch_id')->nullable();
                $table->double('jar_g_total', 15, 2)->nullable();
                $table->integer('one_g_total')->nullable();
                $table->integer('one_eight_oz_total')->nullable();
                $table->integer('one_fourth_oz_total')->nullable();
                $table->integer('one_half_oz_total')->nullable();
                $table->integer('one_oz_total')->nullable();
                $table->integer('pre_pack_total')->nullable();
                $table->double('total_weight', 15, 2)->nullable();
                $table->integer('total_qty')->nullable();
                $table->integer('total_qty_per_unit')->nullable();
                $table->integer('total_qty_per_unit_range')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
