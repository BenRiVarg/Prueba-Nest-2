<?php 
namespace App\Organizadores;

use App\Manuales;
use App\SubSeccion;
use App\SeccionesM;

use App\Organizadores\DecodificadorM;

class Seccion{
    //Clase para entregar en orden las secciones
    public $nombreScc; 
    public $idSecc;
    public $subScc;
}

class OrganizadorM
{   
   public $manual; //Manual cuyas Manual se quiere obtener 
   public $nombre; 
   public $secciones=array();

   


    function __construct($manual) {
    $this->manual = Manuales::find($manual); 
    $this->nombre=$this->manual->nombre;
    $this->secciones();
   
  }


   function secciones(){
    //Método para devolver un array hecho de  objetos de secciones
    /*Secciones
        nombreScc->String
        idSecc->Int
        subScc-> array SubScc
    
    */

    //Obtencion de las secciones de la BD
    $secciones=$this->manual->SeccionesM()->get();

    foreach($secciones as $scc){
        $seccion=new Seccion;
        //$idSecc=$scc->idSecc;
        $seccion->idSecc=$scc->idSecc;
        // Se recupera el nombre
        $seccion->nombreScc=$scc->nombreSecc;
        //Se recupera un array con objetos de tipo Subcc(definida en el decodificadorM)
        $seccion->subScc=$this->subSecciones($scc->idSecc);
        //Y finalmente se hace un array de objetos Seccion
        array_push($this->secciones,$seccion);
    
    }

   }


   function subSecciones($id){
       /*
       subScc
       subSccID->string
       nombre->string
       tipo->array
       contenido->array
       */
       //Funcion para retornar las subsecciones en un array con ojetos de tipo Subscc(Definida en decoficadorM)
    
       $decodificador=new DecodificadorM;
    $subsecciones=array();
    //Aquí se modifica para las multiples obtenciones
   
    
    $scc=SeccionesM::find($id)->subsecc()->get();
   
    if (count($scc)>0){
            foreach($scc as $subscc){
                
                $subseccion=$decodificador->leerBD($subscc->id_S);
                array_push($subsecciones,$subseccion);
            }   
     
    }
    return $subsecciones;

   }


}

