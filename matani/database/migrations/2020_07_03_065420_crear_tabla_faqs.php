<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFaqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            
          

            //Sección a la que la Faq pertenece
            $table->unsignedBigInteger('id_sf');
            $table->string('nombre',50);
            $table->text('contenido');
            $table->timestamps();
            $table->bigIncrements('idFaq');
            $table->foreign('id_sf')->references('id_SF')->on('faqSecciones');
            

                        
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
    }
}
