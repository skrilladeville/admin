<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProfilePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_patients', function (Blueprint $table) {
            //
            $table->char('mi')->nullable();
            $table->double('weight')->default(0.0);
            $table->string('weight_unit')->nullable();
            $table->string('passport_num')->nullable();
            $table->string('drivers_license')->nullable();
            $table->string('fax_phone')->nullable();
            $table->string('address_1');
            $table->longText('address_2')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_patients', function (Blueprint $table) {
            $table->dropColumn('mi');
            $table->dropColumn('weight')->default(0.0);
            $table->dropColumn('weight_unit');
            $table->dropColumn('passport_num');
            $table->dropColumn('drivers_license');
            $table->dropColumn('fax_phone');
            $table->dropColumn('address_1');
            $table->dropColumn('address_2');
        });
    }
}
