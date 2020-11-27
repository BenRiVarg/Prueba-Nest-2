<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFaqSecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqSecciones', function (Blueprint $table) {
            
            $table->BigIncrements('id_SF');
            $table->string('nombre',50);
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
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('faqSecciones');
    }
}
