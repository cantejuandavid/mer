<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemisionEntradaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remision_entrada_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRemisionEntrada')->unsigned();
            $table->integer('idProducto')->unsigned();
            $table->foreign('idRemisionEntrada')->references('id')->on('remision_entrada');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remision_entrada_detalle');
    }
}
