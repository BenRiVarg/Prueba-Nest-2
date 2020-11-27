<?php 
namespace App\Organizadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Http\File;

use App\SeccionesM ;
use App\SubSeccion as scc;

class SubScc{

  public $subSccID; //Id único para manipular una subsección
  public $nombre;   //Nombre de la sub Sección
  public $tipo;     //Variable para determinar todos los tipos de elementos que tiene una sección (txt, img, etc)
  public $contenido;//contenido del tipo de elemento definido
  
}

class Compilado{
  public $subSeccion; //Nombre de la SubSección a la que pertenece un compilado
  public $contador;   //Contador de cuantos elementos tiene cada compilado para guardarlo en la BD
  public $compilado;  //Compilado con los datos que pertenecen a la subSección
}
class DecodificadorM
{
    function compilar(Request $request){
       // return $request->all();
        /*Método que procesa la request y devuelve un "compilado " */
        
        //conversión de la request en Array
        $requestar=$request->toArray();

        //Obtención del orden en los que se enviaron los elementos en el editor
        $eorden=ltrim($request->ordenElementos,"-");
        $orden=explode("-",$eorden);
        print_r($orden);
        
        //destrucción de los elementos para que no afecte el procesamiento 
       
        //Creación del compilado vacío
        $compilado="";
        //Claves para almacenar y leer en la BD
        $claveMat="_fu__";
        $claveMatF="__z_"; //final del elemento
        echo count($requestar);
        
        for($i=0;$i<count($orden);$i++) 
        {   
            //alamacenado en orden y decodificación de elementos
            $elemento=$orden[$i];
            $desglozadoClave=explode("m",$elemento);
            $clave=$desglozadoClave[0];
            /*Motor de la clase aquí se define qué es lo que se puede almacenar.
            Para poder el elemento enviado por la request debe tener  la estructura:
            clave-m-número
            en cullo caso la clave es la que revisa el switch , la m sirve para distinguir entre la clave y el numero
            y el número es la forma de rastrear al elemento (ya capturadda en la variable $elemento)
            */
            
            switch ($clave) {
              case "t":       //texto
                $compilado=$compilado.$claveMat.'t'.$claveMatF.$requestar[$elemento];
                break;
                case "se":  //SuperEditor
                  $compilado=$compilado.$claveMat.'se'.$claveMatF.$request->superEditor;
                  
                  break;
              case "i":       //imagenes
                  $i_key=$elemento;
                  //Almacenado de la imagen
                  request()->file($i_key)->storeAs('temporal', request()->file($i_key)->getClientOriginalName(),'public');
                  //Asignación dentro del compilado
                  $compilado=$compilado.$claveMat.'i'.$claveMatF.request()->file($i_key)->getClientOriginalName();
                  
                break;
              case "iS":
                //Imágenes sin modificar despues de pasar un editor. Sólo se crea el compilado pasando el antiguo valor
                $compilado=$compilado.$claveMat.'i'.$claveMatF.$requestar[$elemento];
                break;
              default:
                echo "ERROR CON LA LECTURA  DE DATOS";
              }
        }
        $datosCompilado=[count($orden),$compilado];
        return $datosCompilado;
        
    }
    ///////
    function compilarN(Request $request){
      /*Método que procesa la request y devuelve un "conglomerado " con N compilados 
      Estructura:
        conglomerado['nomSecc']->string
        conglomerado['subS']->array de objetos Compilado

      */
        
            //conversión de la request en Array
            $requestar=$request->toArray();

            //Variable que almacena todos los datos a guardar
            $conglomerado=["nomSecc"=>$request->nomSecc];
            $compilados=array();
            

            //Obtención del orden en los que se enviaron los elementos en el editor
            $eorden=ltrim($request->ordenElementos,"-");
            $orden=explode("-",$eorden);

            //Creación del compilado vacío
            $compilado="";
            //Claves para almacenar y leer en la BD
            $claveMat="_fu__";
            $claveMatF="__z_"; //final del elemento
            $subSeccion="";//Variable para "capturar" el nombre de la SubSección en cada caso
            $contador=0;  //Variable para recibir el contador de cuantos elementos tiene cada compilado
            for($i=0;$i<count($orden);$i++) 
            {   
                //alamacenado en orden y decodificación de elementos
                $elemento=$orden[$i];
                $desglozadoClave=explode("m",$elemento);
                $clave=$desglozadoClave[0];
                /*Motor de la clase aquí se define qué es lo que se puede almacenar.
                Para poder el elemento enviado por la request debe tener  la estructura:
                clave-m-número
                en cullo caso la clave es la que revisa el switch , la m sirve para distinguir entre la clave y el numero
                y el número es la forma de rastrear al elemento (ya capturadda en la variable $elemento)
                */
                
                switch ($clave) {
                  case "Sub":
                    //Captura del nombre de la SubSección
                   $subSeccion=$requestar[$elemento];
                  break;
                  case "t":       //texto
                    $compilado=$compilado.$claveMat.'t'.$claveMatF.$requestar[$elemento];
                    $contador++;
                    break;
                  case "se":
                    $compilado=$compilado.$claveMat.'se'.$claveMatF.$request->superEditor;
                    $contador++;
                    break;
                  case "i":       //imagenes
                      $i_key=$elemento;
                      //Almacenado de la imagen
                      request()->file($i_key)->storeAs('temporal', request()->file($i_key)->getClientOriginalName(),'public');
                      //Asignación dentro del compilado
                      $compilado=$compilado.$claveMat.'i'.$claveMatF.request()->file($i_key)->getClientOriginalName();
                      $contador++;
                    break;
                  case "iS":
                    //Imágenes sin modificar despues de pasar un editor. Sólo se crea el compilado pasando el antiguo valor
                    $compilado=$compilado.$claveMat.'i'.$claveMatF.$requestar[$elemento];
                    break;
                  case "fin":
              
                    $compiladoAgregado=new Compilado();
                    $compiladoAgregado->subSeccion=$subSeccion;
                    $compiladoAgregado->contador=$contador;
                    $compiladoAgregado->compilado=$compilado;
                    array_push($compilados,$compiladoAgregado);
                    $compilado="";
                    $contador=0;
                   break;
                  default:
                    echo "ERROR CON LA LECTURA  DE DATOS";
                  }
                  
            }

            $conglomerado["subS"]=$compilados;
            return $conglomerado;
            
    }

    ///////
    function leer($contador,$compilado){
      $tipoElemento=array();
      $contenido=array();

      $desglozado=explode("_fu__",$compilado);//destrucción del compilado en base al primer separador
      unset($desglozado[0]);//borrado de un espacio en blanco

      
        
          for($i=1;$i<=$contador;$i++){
            $content=explode("__z_",$desglozado[$i]);
  
           array_push($tipoElemento,$content[0]);
            array_push($contenido,$content[1]);
           }
        
        $datos= new SubScc;
        $datos->tipo=$tipoElemento;
        $datos->contenido=$contenido;
        
      
        return $datos;
        
    }
    
    function leerBD($id){
      //Método para leer y procesar el compilado, 
      /*Parametro de entrada $id ->hace referencia al id_S en la tabla subSección único para cada resgistro */
      //obtención del Nombre de la subsección
      $nombre=scc::where('id_S',$id)->value('nombre');
      $compilado=scc::where('id_S',$id)->value('contenido');
      $desglozado=explode("_fu__",$compilado);
      unset($desglozado[0]);//borrado de un espacio en blanco

      //Obtención de los elementos y de que tipo son
      
      
      $contador=scc::where('id_S',$id)->value('contador');;
      $tipoElemento=array();
      $contenido=array();

      for($i=1;$i<=$contador;$i++){
          $content=explode("__z_",$desglozado[$i]);
          array_push($tipoElemento,$content[0]);
          array_push($contenido,$content[1]);
        
      }

      $datos= new SubScc;
      $datos->subSccID=$id;
      $datos->nombre=$nombre;
      $datos->tipo=$tipoElemento;
      $datos->contenido=$contenido;
      
     
      return $datos;
      
    }
}