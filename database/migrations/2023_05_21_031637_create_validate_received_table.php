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
            $table->Time('time_created');
            $table->date('date_delivery');
            $table->integer('unities');
            $table->integer('boxes');
            $table->string('customer');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status');
            $table->string('received_date')->nullable();
            $table->text('news')->nullable();
            $table->unsignedBigInteger('through');
            $table->foreign('through')->references('id_delivery')->on('delivery');
            $table->string('sender')->nullable();
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
        $des = "des";
        Schema::dropIfExists('validate_received');
    }
};
