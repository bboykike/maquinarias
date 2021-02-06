<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id_servicio');
            $table->String('title');
            $table->dateTime('start');
            $table->String('direccion');
            $table->String('municipio');
            $table->String('estado');
            $table->String('id_rfc')->nullable();
            $table->String('cfdi')->nullable();
            $table->float('monto_facturacion', 10, 2);
            $table->String('estatus');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->unsignedBigInteger('id_operador');
            $table->foreign('id_operador')->references('id_operador')->on('operadors');
            $table->unsignedBigInteger('id_vendedor');
            $table->foreign('id_vendedor')->references('id_vendedor')->on('vendedores');
            $table->String('razon_cancelacion')->nullable();
            $table->String('color');
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
        Schema::dropIfExists('servicios');
    }
}
