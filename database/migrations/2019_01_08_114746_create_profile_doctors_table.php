<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profession');
            $table->string('license_no');
            $table->string('clinic_name');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('telephone');
            $table->string('extension');
            $table->string('health_card');
            $table->string('emg_contact', 255);
            $table->string('emg_contact_phone');
            $table->integer('profile_branch_admins_id');
            $table->integer('branches_id');
            $table->integer('user_id')->unsigned();
            $table->integer('status');
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
        Schema::dropIfExists('profile_doctors');
    }
}
