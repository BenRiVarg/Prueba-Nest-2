<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablasecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            
            //Relación con la sección
            $table->bigIncrements('idSecc');
            //Relación con el manual
            $table->String('nombreSecc');
            $table->unsignedBigInteger('idManual');
            $table->foreign('idManual')->references('id')->on('manuales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual');
    }
}
