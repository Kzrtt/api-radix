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
        Schema::create('tblPedidoTemp', function (Blueprint $table) {
            $table->id('idPedidoTemp');
            $table->string('endereco');
            $table->date('data');
            $table->unsignedBigInteger('idPedido')->unsigned();
            $table->foreign('idPedido')->references('idPedido')->on('tblPedido');
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
        Schema::dropIfExists('tbl_pedido_temps');
    }
};
