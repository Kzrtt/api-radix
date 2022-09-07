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
        Schema::create('tblCliente', function (Blueprint $table) {
            $table->id('idCliente');
            $table->string('nomeCliente');
            $table->string('cpfCliente');
            $table->string('emailCliente');
            $table->string('senhaCliente');
            $table->boolean('statusCliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
