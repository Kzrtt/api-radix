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
        Schema::create('tblPedido', function (Blueprint $table) {
            $table->id('idPedido');
            $table->datetime('dataPedido');
            $table->float('frete');
            $table->unsignedBigInteger('idCliente')->unsigned();
            $table->unsignedBigInteger('idVendedor')->unsigned();
            $table->unsignedBigInteger('idCupomCliente')->unsigned();
            $table->unsignedBigInteger('idEntregador')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('tblCliente');
            $table->foreign('idVendedor')->references('idVendedor')->on('tblVendedor');
            $table->foreign('idCupomCliente')->references('idCupomCliente')->on('tblCupomCliente');
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
        Schema::dropIfExists('pedidos');
    }
};
