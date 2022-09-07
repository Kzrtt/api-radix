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
        Schema::create('tblProduto', function (Blueprint $table) {
            $table->id('idProduto');
            $table->string('nomeProduto');
            $table->string('imagemProduto');
            $table->string('detalheProduto');
            $table->double('preco', 8, 2);
            $table->boolean('statusProduto');
            $table->unsignedBigInteger('idVendedor')->unsigned();
            $table->foreign('idVendedor')->references('idVendedor')->on('tblVendedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
