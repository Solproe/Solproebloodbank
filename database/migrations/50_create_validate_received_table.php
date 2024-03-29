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
        Schema::create('validate_received', function (Blueprint $table) {
            $table->id();
            $table->string('consecutive');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->dateTime('date');
            $table->integer('unities');
            $table->integer('boxes');
            $table->string('customer');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status');
            $table->string('received_date');
            $table->text('news');
            $table->unsignedBigInteger('throught');
            $table->foreign('throught')->references('id_delivery')->on('delivery');
            $table->string('sender');
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
        Schema::dropIfExists('validate_received');
    }
};
