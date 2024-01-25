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
            $table->unsignedBigInteger('id_centre');
            $table->foreign('id_centre')->references('ID_CENTRE')->on('centre');
            $table->unsignedBigInteger("id_user");
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('token')->nullable();
            $table->foreign('token')->references('id')->on('token');
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
