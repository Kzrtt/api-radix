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
        Schema::create('tblCupomCliente', function (Blueprint $table) {
            $table->id('idCupomCliente');
            $table->unsignedBigInteger('idCliente')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('tblCliente');
            $table->unsignedBigInteger('idCupom')->unsigned();
            $table->foreign('idCupom')->references('idCupom')->on('tblCupom');
            $table->boolean('usado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupom_clientes');
    }
};
