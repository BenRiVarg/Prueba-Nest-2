<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Http\File;


use App\Manuales;
use App\Secciones ;

use App\Organizadores\DecodificadorM;
use App\Organizadores\OrganizadorM;
use App\Organizadores\Seccion ;


use App\SeccionesM ;
use App\SubSeccion ;
use Illuminate\Support\Facades\View;

class ControladorManuales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
      //Obtención de todos los datos del Manual
      $manual=new OrganizadorM($id);
      return view('crud.manual.listadoManual',compact('id','manual'));
      
   
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        //Creación de nuevo Manual al 100%
        return view('crud.manual.nuevoManual');

        //Creación de una sección dentro de un Manual
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function nuevaSeccionManual($id){

     return view ('crud.manual.crearSM',compact('id'));
     }
     
    public function store(Request $request)
    {      
       //Casos de Creación

       
        if(isset($request->indicador)and $request->indicador=="nuevoManual")
        {
           //Creación de manual desde 0
          $manual= new Manuales;
          $manual->nombre= $request->nomMan;
          $manual->clavem= $request->clave;
          $manual->img= request()->file('img')->getClientOriginalName();
          $manual->descripcion= $request->descripcion;
          $manual->save();

          //Almacenado de la imagen
            request()->file('img')->storeAs('definitivo', request()->file('img')->getClientOriginalName(),'public');
        //Falta la redirección
        return redirect()->route('Dash');
        }
        else
        { 
          //guardado en la base de datos despues de revisar la nueva sección temporal

         
       
            $id_secc = SeccionesM::insertGetId(
              ['idManual' => $request->manual,
              'nombreSecc' => $request->nSeccion]
          );
            
          for($i=0;$i<$request->contador;$i++){
            //Creación de selectores dinámicos para la creación en la BD
            $selectorSub="nombSub".$i;
            $selectorCont="cont".$i;
            $selectorComp="comp".$i;

            
            $subSeccion= new SubSeccion;
            //Enlace con la Sección
            $subSeccion->idSeccion=$id_secc;
            $subSeccion->nombre=$request->$selectorSub;
            $subSeccion->contador=$request->$selectorCont;
            $subSeccion->contenido=$request->$selectorComp;
            $subSeccion->save();

          }

          
          return redirect()->route('indexCM',$request->manual)->with('success','Secciones Creadas');
          
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ControladorManuales  $controladorManuales
     * @return \Illuminate\Http\Response
     */
    //public function show($id,$nomSecc,$nomSubS,$comp)
    public function show(Request $request)
    {   //Muestra del manual , para aprovación y guardado en la BD
     
      
       //return $request->all();
       
      //$request->nomSecc;
       if(isset($request->indicador) and $request->indicador=="temporal")
      { 
        
        //Creación de las secciones y subsecciones de un manual ya definido
        //Creación del compilado previo al guardado
        $decodificador=new DecodificadorM();
        $conglomerado=$decodificador->compilarN($request);
       
        $id=$request->manual;
        $SubSeccionesTemp=array();
            for($i=0;$i<count($conglomerado['subS']);$i++)
                {
                $subS=$conglomerado['subS'][$i];
                $SubTemporal=$decodificador->leer($subS->contador,$subS->compilado);
                $SubTemporal->nombre=$subS->subSeccion;
                array_push($SubSeccionesTemp,$SubTemporal);
              }
        //Obtención de todo el manual en operación
        $manual=new OrganizadorM($request->manual);
        $nombre=$manual->nombre;
        $secciones=$manual->secciones;
        
        //Adaptación del nuevo contenido creado para insertarlo en las secciones del manual
        $seccion=new Seccion;
       
        // Se recupera el nombre
        $seccion->nombreScc=$request->nomSecc;
        //Se recupera un array con objetos de tipo Subcc(definida en el decodificadorM)
        $seccion->subScc=$SubSeccionesTemp;
        //Y finalmente se hace un array de objetos Seccion
      //Previa conversión a array
       $datos_e=[$seccion];
       //Inserción de los nuevos datos 
       array_push($secciones,$seccion);
           
            
           return view('plataforma.cliente.manualShow',compact('id','nombre','secciones','conglomerado','SubSeccionesTemp'));
              //return view('crud.manual.matocify',compact('id','conglomerado','SubSeccionesTemp'));
             
        
      }
     
       /* CÓDIGO PARA SUPLANTAR UNA PARTE DEL MANUAL
        
        $manual=new OrganizadorM($id);
        $nombre=$manual->nombre;
        $secciones=$manual->secciones;

        
        //Sacas la sección , es la registrada en el listado -1
        $nombre=['Nombre SubSección Hackiada'];
        $tipo=['t'];
        $contenido=['El contenido ha sido Hackiado'];
        $datos_e=['nombre'=>$nombre,'tipo'=>$tipo,'contenido'=>$contenido];
        $editor=[$datos_e];
      
        
        $secciones[1]->nombreScc="Hackiado";
        $secciones[1]->subScc=array_replace($secciones[1]->subScc,$editor);
       print_r($secciones);
       */
        /*múltiple envío opcional
        DEFINES EL ARRAY
         $datos=array(
            'id'=>$request->manual,
            'nomSecc'=>$request->nomSecc,
            'opcional'=>"Recibido con éxito"
          );

        RUTA CON ESPECIFICACIONES
        Route::get('/showM/{id}/nS/{nomSecc}/op/{opcional?}

        CONTROLADOR CON VALORES PREDEFINIDOS
         public function show($id,$nomSecc,$opcional=null)
        */
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ControladorManuales  $controladorManuales
     * @return \Illuminate\Http\Response
     */
    public function edit($editor)
    {   //Editor para cada caso: $selector [0]->selectorCaso [1]-> id para editar
        $selector=explode("EE",$editor);
        $caso=$selector[0];
        switch ($caso) {
          //Edición del Título y la imágen de un Manual.
          case "manual":
            echo "Edición nombre Manual";
            break;
          //Edición del Título de una sección
          case "nomSecc":
            $caso="nSeccion";
            $seccion= SeccionesM::where('idSecc',$selector[1])->first();
           return view('crud.manual.editorSM',compact('caso','seccion'));
            break;
          //Edición de una sección para añadir subsecciones(Incremento de la Sección)
          case "incrementoSecc":
            $caso="iSeccion";
            $seccion= SeccionesM::where('idSecc',$selector[1])->first();
            return view('crud.manual.editorSM',compact('seccion','caso'));
            break;
          //Edición de una subsección en particular(Incremento de la SubSección)
          case "editSubS":
            $SubSeccion=$selector[1];
            $decodificador=new DecodificadorM;
            $elementos=$decodificador->leerBd($SubSeccion);
          
            return view('crud.manual.editorSubS',compact('SubSeccion','elementos'));

            break;
          default:
            echo "Error en la lectura de datos";
        } 
        
        
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ControladorManuales  $controladorManuales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $editor)
    { 

     $decodificador=new DecodificadorM();
     $indicador=$request->indicador;
     switch($indicador){
       //Editor del nombre de una Sección
       case "Nseccion":
        SeccionesM::where('idSecc',$request->seccion)->update([
          'nombreSecc'=>$request->titulo
        ]);

        $idmanual=SeccionesM::where('idSecc',$request->seccion)->value('idManual');
        return redirect()->route('indexCM',$idmanual)->with('success','Secciones Creadas');
       break;
       case "subseccion":
          //Edición de una SubSección unicamente
      $datosCompilado=$decodificador->compilar($request);
      SubSeccion::where('id_S', $editor)->update([
          'contador'=>$datosCompilado[0], 
          'contenido'=>$datosCompilado[1]
          ]);

          //Datos para saber a que manual redireccionar
          $idSeccion=SubSeccion::where('id_S',$editor)->value('idSeccion');
          $idmanual=SeccionesM::where('idSecc',$idSeccion)->value('idManual');
        return redirect()->route('indexCM',$idmanual)->with('success','Secciones Creadas');

       break;
       case "seccion":
        //Incremento o decremento de una Sección con multiples subsecciones 
        $conglomerado=$decodificador->compilarN($request);
      
     
        for($i=0;$i<count($conglomerado['subS']);$i++){
         $subSeccion= new SubSeccion;
         //Enlace con la Sección
         $subSeccion->idSeccion=$editor;
         $subSeccion->nombre=$conglomerado['subS'][$i]->subSeccion;
         $subSeccion->contador=$conglomerado['subS'][$i]->contador;
         $subSeccion->contenido=$conglomerado['subS'][$i]->compilado;
         $subSeccion->save();
        }
  
        $idmanual=SeccionesM::where('idSecc',$editor)->value('idManual');
        return redirect()->route('indexCM',$idmanual)->with('success','Secciones Creadas');
       break;

     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ControladorManuales  $controladorManuales
     * @return \Illuminate\Http\Response
     */


    public function destroy($destructor)
    {
        //Destruir un Manual entero 
        //Destruir una sección en particular 
        

        $selector=explode("DD",$destructor);
        $caso=$selector[0];
        switch ($caso) {
          //Destruir un Manual entero 
          case "destruirM":
            echo  "Destruir Manual";
            break;
          //Destruir una sección en particular 
          case "destruirS":
            echo "Destruir Sección ";
            break;
         //Destruir la subsección
          case "destruirSub":
                 //obtención del manual al que pertenece la SubSección
              $SubS=SubSeccion::where('id_S',$selector[1])->value('idSeccion');
              //Obtención del manual  al que una SubSección pertenece para la redirección
              $idmanual=SeccionesM::find($SubS)->manual->id;

              //Borrado de una Sección si ya no tiene subSecciones
              if (count(SubSeccion::where('idSeccion',$SubS)->get())<2){
                  SubSeccion::where('id_S', $selector[1])->delete();
                  SeccionesM::where('idSecc',$SubS)->delete();
              }

              SubSeccion::where('id_S', $selector[1])->delete();

              //Redirección

              return redirect()->route('indexCM',$idmanual)->with('success','Faq eliminada');
            break;
       
          default:
            echo "Error en la lectura de datos";
        } 
        
    }

 
}
