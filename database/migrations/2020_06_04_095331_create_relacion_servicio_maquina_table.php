<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionServicioMaquinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion__servicio__maquinas', function (Blueprint $table) {
            $table->bigIncrements('id_relacion');
            $table->integer('id_maquina')->unsigned()->index();
            $table->integer('id_servicio')->unsigned()->index();
            $table->float('precio_hr', 10, 2);
            $table->integer('num_hr');
            $table->integer('horas_encendido')->nullable();
            $table->float('valor', 10, 2);
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
        Schema::dropIfExists('relacion_servicio_maquina');
    }
}
