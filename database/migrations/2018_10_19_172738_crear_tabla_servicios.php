<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_empresa');
            $table->string('tipo_empresa');
            $table->string('numero_accionistas');
            $table->string('cantidad_capital');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('suceso');
            $table->string('soportes');
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
