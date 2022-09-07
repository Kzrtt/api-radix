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
        Schema::create('tblLembrete', function (Blueprint $table) {
            $table->id('idLembrete');
            $table->string('titulo');
            $table->string('requisitados');
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
        Schema::dropIfExists('lembretes');
    }
};
