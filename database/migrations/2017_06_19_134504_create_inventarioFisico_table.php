<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioFisicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_fisico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAlmacen')->unsigned();
            $table->foreign('idAlmacen')->references('id')->on('almacenes');
            $table->integer('idProducto')->unsigned();
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
        Schema::dropIfExists('inventario_fisico');
    }
}
