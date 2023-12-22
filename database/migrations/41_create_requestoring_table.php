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
        Schema::create('requestoring', function (Blueprint $table) {
            $table->id();
            $table->string('TAX_IDENTIFICATION');
            $table->string('CHECK_DIGITAL');
            $table->unsignedBigInteger('ID_REGIMENS');
            $table->foreign('ID_REGIMENS')->references('id')->on('regimens');
            $table->string('NAME');
            $table->string('ADDRESS');
            $table->string('LEGAL_REPRESENTATIVE');
            $table->string('CITIZENSHIP_CARD');
            $table->string('PHONES');
            $table->string('LANDLINE');
            $table->string('EMAIL');
            $table->unsignedBigInteger('ID_TOWN');
            $table->foreign('ID_TOWN')->references('ID_TOWN')->on('towns');
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
        Schema::dropIfExists('requestoring');
    }
};
