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
        Schema::create('tblVendedor', function (Blueprint $table) {
            $table->id('idVendedor');
            $table->string('nomeVendedor');
            $table->string('cpfCnpj');
            $table->string('emailVendedor');
            $table->string('senhaVendedor');
            $table->string('enderecoVendedor');
            $table->string('fotoPerfil');
            $table->double('selo', 8, 2);
            $table->boolean('statusConta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendedors');
    }
};
