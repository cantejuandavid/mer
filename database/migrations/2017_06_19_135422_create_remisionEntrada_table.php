<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemisionEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remision_entrada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 20);            
            $table->integer('idProveedor')->unsigned();
            $table->integer('idAlmacen')->unsigned();
            $table->foreign('idProveedor')->references('id')->on('proveedores');
            $table->foreign('idAlmacen')->references('id')->on('almacenes');
            $table->integer('estado');
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
        Schema::dropIfExists('remision_entrada');
    }
}
