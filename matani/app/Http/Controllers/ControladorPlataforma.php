<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as usuarios;
use App\Manuales;
use App\Sxfaqs;
use App\SeccionesM;

use App\Organizadores\OrganizadorFaq;
use App\Organizadores\DecodificadorM;
use App\Organizadores\OrganizadorM;

class ControladorPlataforma extends Controller
{
    
    //------------Layouts------------------
    public function Aultra(){       //Control general de las herramientas Admin
        return view('plataforma.layout');
    }


    public function Usr(){          //Layout para vista del cliente (Excepto index)
        return view('plataforma.usr');
    }

    // --------||Index ||--------
    

    public function indxcliente(){  //Index General de la plataforma
      
        $manuales=Manuales::all();
        $imagenes=array();          //Array de Imagenes de los manuales
        //Obtención de las imágenes
        foreach($manuales as $manual)
        {
            array_push($imagenes,$manual->img);
        }
        
        return view('plataforma.index',compact('manuales','imagenes')); //Vista de los manuales del Cliente
    }

    public function dashboard(){       //Index de Admin 
     
        $usuarios=count(usuarios::all());
        $contadorManuales=count(Manuales::all());
        $manuales=Manuales::all();

        $estadoManuales=array();
        //Contador de cuantas secciones hay por manual o faqs
        
        foreach($manuales as $manu){
            $manual=$manu->id;
            $estadoManual=count(SeccionesM::where('idManual',$manual)->get());
            $estadoFaqs=count(Sxfaqs::where('idManual',$manual)->get());
            $estado=compact('estadoManual','estadoFaqs');
            array_push($estadoManuales,$estado);
        }
       
       return view('plataforma.dashboard.index',compact('usuarios','contadorManuales','manuales','estadoManuales'));
       
    }

    /*------||Clientes||---
    Todas estas vistas son para las clientes que revisan el Manual
    */
  
    public function faqs($id){
        $nombre=Manuales::find($id)->nombre;//nombre Del Manual
        $contenedorSecciones= new OrganizadorFaq($id);
        $nombreSecc=$contenedorSecciones->secciones();
        $faqs=$contenedorSecciones->faqs();
        return view('plataforma.cliente.faqs',compact('id','nombre','nombreSecc','faqs'));
    }

    public function manual(Request $request){
        
     
        $id=$request->id;
        $manual=new OrganizadorM($id);
      $nombre=$manual->nombre;
        $secciones=$manual->secciones;

      return view('plataforma.cliente.manual',compact('id','nombre','secciones'));
      

      
    }
   


    // --------||Usuarios||-------
    public function usuarios(){
        $usuarios=usuarios::all();
        return view('plataforma.usuarios.index')->with('usuarios',$usuarios);
    }


    public function salvarUsr(){
       return view('plataforma.usuarios.save');
    }

  
    //------||Administradores||---
  
    public function manualA($id){
        
        $manual=new OrganizadorM($id);
      $nombre=$manual->nombre;
        $secciones=$manual->secciones;

      return view('plataforma.cliente.manual',compact('id','nombre','secciones'));
    }

    public function listadoFaq($idManual){
        
        $nombreM="Matani";
        return view('plataforma.admin.listadoFaqs',compact('nombreM'));
    }
    public function listadoManual(){
       
        
        return view('plataforma.admin.listadoManual');
    }


    

    public function editorFaqs(){
        return view('plataforma.admin.editores.faqs');
    }

    public function editorManual(Request $request){

        //Prueba de  Codificador M
       
       $decodificador=new DecodificadorM;
       return  $decodificador->escribir($request);
       
        

        // return view('plataforma.admin.editores.manual');
    }

    public function salvarFaqs(Request $request){
       //Aún sin funcionar
       
        /*
        Faqs::create($request->all());


        return view('plataforma.cliente.faqs')->with('datos',$datos);
        */
    }
    
    //------||Contacto||---
    public function contacto(){
        //echo "AQUI ESTARÁ LA INFORMACIÓN PARA CONTÁCTO";
        return view('plataforma.contacto.index');
    }


}
