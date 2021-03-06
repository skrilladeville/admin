<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('health_card');
            $table->string('emg_contact', 255);
            $table->string('emg_contact_phone');
            $table->integer('profile_doctors_id');
            $table->integer('branches_id');
            $table->integer('user_id')->unique();
            $table->integer('status');
            $table->char('mi', 1)->nullable();
            $table->double('weight')->default(0.0);
            $table->char('weight_unit', 2)->nullable();
            $table->string('passport_num')->nullable();
            $table->string('drivers_license')->nullable();
            $table->string('fax_phone')->nullable();
            $table->string('address_1');
            $table->longText('address_2')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_patients');
    }
}
