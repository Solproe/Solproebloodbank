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
        Schema::create('order_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_applicant');
            $table->foreign('id_applicant')->references('id')->on('users');
            $table->unsignedBigInteger('id_team');
            $table->foreign('id_team')->references('id')->on('teams');
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('status');
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
        Schema::dropIfExists('order_request');
    }
};
