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
        Schema::create('tblMsg_vendedor', function (Blueprint $table) {
            $table->id('idMsgVendedor');
            $table->string('mensagem');
            $table->datetime('data');
            $table->unsignedBigInteger('idConversa')->unsigned();
            $table->foreign('idConversa')->references('idConversa')->on('tblConversa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msg_vendedors');
    }
};
