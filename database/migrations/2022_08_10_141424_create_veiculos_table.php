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
        Schema::create('tblVeiculo', function (Blueprint $table) {
            $table->id('idVeiculo');
            $table->string('nome');
            $table->string('placa');
            $table->string('modelo');
            $table->unsignedBigInteger('idEntregador')->unsigned();
            $table->foreign('idEntregador')->references('idEntregador')->on('tblEntregador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
