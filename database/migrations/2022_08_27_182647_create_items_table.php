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
        Schema::create('tblItem', function (Blueprint $table) {
            $table->id('idItem');
            $table->integer('qntdItem');
            $table->unsignedBigInteger('idProduto')->unsigned();
            $table->unsignedBigInteger('idPedido')->unsigned();
            $table->foreign('idProduto')->references('idProduto')->on('tblProduto');
            $table->foreign('idPedido')->references('idPedido')->on('tblPedido');

        });
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
