<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_validation_blood_banks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bloodbank');
            $table->foreign('id_bloodbank')->references('id_centre')->on('centre');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('identification');
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
        Schema::dropIfExists('users_validation_blood_banks');
    }
};
