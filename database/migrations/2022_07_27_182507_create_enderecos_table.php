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
        Schema::create('tblEndereco', function (Blueprint $table) {
            $table->id('idEndereco');
            $table->string('apelidoEndereco');
            $table->string('endereco');
            $table->string('complemento');
            $table->string('numero');
            $table->boolean('statusEndereco');
            $table->unsignedBigInteger('idCliente')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('tblCliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
