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
        Schema::create('tblVendedorFav', function (Blueprint $table) {
            $table->id('idVendedorFav');
            $table->unsignedBigInteger('idCliente')->unsigned();
            $table->unsignedBigInteger('idVendedor')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('tblCliente');
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
        Schema::dropIfExists('tbl_vendedor_favs');
    }
};
