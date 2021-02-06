<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id_logs');
            $table->integer('id_relacion_fk')->unsigned()->index();
            $table->string('hrmt_inicial')->nullable();
            $table->string('hrmt_final')->nullable();
            $table->float('hrs_inactivo', 10, 2)->nullable();
            $table->float('hrs_activo', 10, 2)->nullable();
            $table->float('num_hrs_ensendido', 10, 2)->nullable();
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
        Schema::dropIfExists('logs');
    }
}
