<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sxfaqs ;
use App\Faqs;
use App\Manuales;
use App\Organizadores\OrganizadorFaq;
use Illuminate\Support\Facades\View;
class ControladorFaqs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index($id)
    {   
        $idM=$id;
        $nombreM=Manuales::find($id)->nombre;

        $faqManual= new OrganizadorFaq($id);
        $Secc=$faqManual->seccionesCompletas();
        $faqs=$faqManual->faqs();
        
     
        return view('crud.faqs.listadoFaqs',compact('idM','nombreM','Secc','faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $filtroES=explode('SS',$id);
        if($filtroES[0]=="Secc")
        {   
            $idS=$filtroES[1];
           //echo "Editar Faq sin seccion";
            return view('crud.faqs.crearFaqs',compact('idS'));
        }
        else
        {
            //Editor Completo
            return view('crud.faqs.crearFaqs',)->with('idM',$id);
        }
      
      return view('crud.faqs.crearFaqs',)->with('idM',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        
        if(isset($request->seccion)){ //Creación de faqs, con una sección ya definida
            $rules = [
                'tf0'=>'required',
                'cf0'=>'required',
            ];
            $messages = [
                'tf0.required'=>'Debes enviar el titulo de al menos 1 Faq',
                'cf0.required'=>'Debes enviar el contenido de al menos 1 Faq'
            
            ];
            $this->validate($request, $rules, $messages);

            $delimitador=(count($request->all())-2)/2;
            for($i=0;$i<$delimitador;$i++){
                $elementoTF="tf".$i;
                $elementoCF="cf".$i;

                $nuevaFaq= new Faqs;
                $nuevaFaq->id_sf=$request->seccion;
                $nuevaFaq->nombre=$request->$elementoTF;
                $nuevaFaq->contenido=$request->$elementoCF;
                $nuevaFaq->save();
        
            }

            //Captura del Manual en el que se modifica para redireccionar
            $idmanual=Sxfaqs::find($request->seccion)->manual->id;
            
        return redirect()->route('indexCF',$idmanual)->with('success','Faq registrada');
            
        }
        else
        {   //Creación total de Sección con Faqs
            $rules = [
                'nomSecc'=>'required',
                'tf0'=>'required',
                'cf0'=>'required',
            ];
             
            $messages = [
                'nomSecc.required'=>'Debes enviar el nombre de la sección',
                'tf0.required'=>'Debes enviar el titulo de al menos 1 Faq',
                'cf0.required'=>'Debes enviar el contenido de al menos 1 Faq'
            
            ];
             
            $this->validate($request, $rules, $messages);
            
            //Seccion que se genera, y en la que se guardarán los datos
            $id_secc = Sxfaqs::insertGetId(
                ['idManual' => $request->manual,
                'nombre' => $request->nomSecc]
            );
           
    
             //Variable para calcular las iteraciones que se deben hacer 
            //quitando campos y ajustandolo solo a tf y cf 
           $delimitador=(count($request->all())-3)/2;
                for($i=0;$i<$delimitador;$i++){
                    $elementoTF="tf".$i;
                    $elementoCF="cf".$i;
    
                    $nuevaFaq= new Faqs;
                    $nuevaFaq->id_sf=$id_secc;
                    $nuevaFaq->nombre=$request->$elementoTF;
                    $nuevaFaq->contenido=$request->$elementoCF;
                    $nuevaFaq->save();
            
                }
                
            return redirect()->route('indexCF',$request->manual)->with('success','Faq registrada');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $realId=explode('SS',$id);
        //Manda a un solo tipo de vista con diferentes valores para renderizar una opcion u otra
        if($realId[0]=="nomSecc"){
            //Edición del nombre de una sección
            $seccion=Sxfaqs::where('id_SF',$realId[1])->first();
            return view('crud.faqs.editarFaqs',compact('seccion'));
        }
        else
        {
            //Edición de una Faq
            $faq=Faqs::where('idFaq',$realId[1])->first();
        
            return view('crud.faqs.editarFaqs',compact('faq'));
        }
        
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $peticion)
    {   
        

        $solicitud=explode('SS',$peticion);
        //Manda a un solo tipo de vista con diferentes valores para renderizar una opcion u otra

        //Envio a la edición del titulo de la Sección
        if($solicitud[0]=="upSecc"){

                Sxfaqs::where('id_SF',$solicitud[1])->update([
                    'nombre' => $request->nomSecc
                ]);

            $idmanual=Sxfaqs::find($solicitud[1])->manual->id;
            return redirect()->route('indexCF',$idmanual)->with('success','Faq registrada');
        }
        //Envio a la edición del Faq de la Sección
        else
        {
            
            Faqs::where('idFaq', $solicitud[1])->update([
                'nombre' => $request->nomFaq,
                'contenido'=>$request->cont
               ]);

                 
               //obtención del manual al que pertenece la Faq
               
                $seccionFaq=Faqs::where('idFaq',$solicitud[1])->value('id_sf');
                 $idmanual=Sxfaqs::find($seccionFaq)->manual->id;
                 //Redirección
              return redirect()->route('indexCF',$idmanual)->with('success','Faq actualizada');
        }
        
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //obtención del manual al que pertenece la Faq
        $seccionFaq=Faqs::where('idFaq',$id)->value('id_sf');
        $idmanual=Sxfaqs::find($seccionFaq)->manual->id;

         //Borrado de una Sección si ya no tiene subSecciones
         if (count(Sxfaqs::where('id_SF',$seccionFaq)->get())<2){
            Faqs::where('idFaq', $id)->delete();
            Sxfaqs::where('id_SF', $seccionFaq)->delete();
           
        }

        Faqs::where('idFaq', $id)->delete();

        //Redirección

        return redirect()->route('indexCF',$idmanual)->with('success','Faq eliminada');

        //Falta crear la destrucción de una sección entera
        //Esto va en las migraciones
        //$table->integer('bicicletas_id')->references('id')->on('bicicletas')->onDelete('cascade');
    }

  
}
