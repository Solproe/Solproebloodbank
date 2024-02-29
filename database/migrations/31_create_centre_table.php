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
        Schema::create('centre', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_CENTRE')->autoIncrement();
            $table->string('COD_CENTRE');
            $table->string('DES_CENTRE');
            $table->string('TAX_IDENTIFICATION')->nullable();
            $table->string('ADDRESS')->nullable();
            $table->string('DOMAIN_NAME')->nullable();
            $table->string('PUBLIC_IP')->nullable();
            $table->string('DB_NAME')->nullable();
            $table->string('DB_USER')->nullable();
            $table->string('PASSWD')->nullable();
            $table->unsignedBigInteger('town');
            $table->foreign('town')->references('ID_TOWN')->on('towns');
            $table->unsignedBigInteger('DB_ACTIVE')->nullable();
            $table->foreign('DB_ACTIVE')->references('id')->on('status');
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
        Schema::dropIfExists('CENTRE');
    }
};
