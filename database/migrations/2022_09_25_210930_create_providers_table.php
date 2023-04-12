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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('tax_identification');
            $table->string('check_digital');
            $table->string('id_regimens');
            $table->string('name');
            $table->string('address');
            $table->string('legal_representative');
            $table->string('CITIZENSHIO_CARD');
            $table->string('phones');
            $table->string('LANDLINE');
            $table->string('email');
            $table->unsignedBigInteger('ID_STATE');
            $table->foreign('ID_STATE')->references('id')->on('providers');
            $table->unsignedBigInteger('ID_TOWN');
            $table->foreign('ID_TOWN')->references('id')->on('providers');
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
        Schema::dropIfExists('providers');
    }
};
