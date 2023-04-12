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
        Schema::create('warehouse_movements', function (Blueprint $table) {
            $table->id();
            $table->string('entity');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('order_request');
            $table->unsignedBigInteger('id_supply');
            $table->foreign('id_supply')->references('id')->on('supplies');
            $table->string('movement_type');
            $table->integer('quantity');
            $table->integer('balance');
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
        Schema::dropIfExists('warehouse_movements');
    }
};
