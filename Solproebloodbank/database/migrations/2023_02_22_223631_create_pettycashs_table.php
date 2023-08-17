<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pettycashs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('number');
            $table->string('movement_type');
            $table->string('document_type');
            $table->string('providers');
            $table->string('supply');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('cost_unit');
            /*  $table->foreign('id_order')->references('id')->on('order_request');
            $table->unsignedBigInteger('id_supply');
            $table->foreign('id_supply')->references('id')->on('supplies');

            $table->integer('balance'); */
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
        Schema::dropIfExists('pettycashs');
    }
};
