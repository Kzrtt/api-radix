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
        Schema::create('cliente_favoritos', function (Blueprint $table) {
            $table->id('idClienteFavorito');
            $table->unsignedBigInteger('idCliente')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('tblCliente');
            $table->unsignedBigInteger('idVendedor')->unsigned();
            $table->foreign('idVendedor')->references('idVendedor')->on('tblVendedor');
            $table->boolean('isFavorite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_favoritos');
    }
};
