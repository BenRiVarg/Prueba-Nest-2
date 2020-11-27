<?php 
namespace App\Organizadores;

use App\Manuales;
use App\SxFaqs;
use App\Faqs;

class OrganizadorFaq
{   
   public $manual; //Manual cuyas faqs se quieren obtener 
   public $secciones;
   public $faqs=array();
   public $arrayScc=array();



    function __construct($manual) {
    $this->manual = $manual; 
  }


   function secciones(){
    $nombreSecciones=array();
    $this->secciones=Manuales::find($this->manual)->seccionesFaq()->get();
    
    
    //Obtención  de los registros
    foreach($this->secciones as $secc){

        //obtención de array con ids para consulta de faqs por sección
        array_push($this->arrayScc,$secc->id_SF);
        //obtención de arrays con nombres de las secciones
        array_push($nombreSecciones,$secc->nombre);
    }

    
    return $nombreSecciones;
   }


   function faqs(){

    /*Obtención de los registros de las faqs
    -nombre
    -contenido
    */

    $this->secciones=Manuales::find($this->manual)->seccionesFaq()->get();
    
    
    //Obtención de  de los registros
    foreach($this->secciones as $secc){

        //obtención de array con ids para consulta de faqs por sección
        array_push($this->arrayScc,$secc->id_SF);
    }


    for($i=0;$i<count($this->arrayScc);$i++){
        $registro=SxFaqs::find($this->arrayScc[$i])->faqs()->get();
        array_push($this->faqs,$registro);
    }

   
    
    return $this->faqs;
   }

   function seccionesCompletas(){
   
    $this->secciones=Manuales::find($this->manual)->seccionesFaq()->get();
    
    
   return $this->secciones;
   }
}