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
        Schema::create('tblDespesa', function (Blueprint $table) {
            $table->id('idDespesa');
            $table->datetime('data');
            $table->string('descricao');
            $table->float('valor');
            $table->string('conta');
            $table->unsignedBigInteger('idAdm')->unsigned();
            $table->foreign('idAdm')->references('idAdm')->on('tblAdm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
};
