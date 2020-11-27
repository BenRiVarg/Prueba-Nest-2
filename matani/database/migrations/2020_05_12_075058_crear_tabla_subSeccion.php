<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablasubSeccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subSecciones', function (Blueprint $table) {
            
            $table->UnsignedBigInteger('idSeccion');
            $table->Integer('contador');
            $table->string('nombre');
            $table->text('contenido');
            $table->timestamps();
            $table->bigIncrements('id_S');
            $table->foreign('idSeccion')->references('idSecc')->on('secciones');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secciones');
    }
}
