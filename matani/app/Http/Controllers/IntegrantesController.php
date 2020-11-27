<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integrantes;

class IntegrantesController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $integrantes = Integrantes::all();
        return view('crud.integrantes.index')->with('integrantes', $integrantes);
        //return view('integrantes.index');
    }

    public function create()
    {
        return view('crud.integrantes.crearI');
    }

    public function store(Request $request)
    {
        $integrante = new Integrantes;

        $integrante->nombre=$request->nombre;
        $integrante->email=$request->correo;
        $integrante->img_url=$request->imagen;
        $integrante->save();

        return redirect()->route('integrantes.index');
    }

    

    public function update(Request $request,$id)
    {
       

        Integrantes::where('id_integrante', $id)
        ->update(['nombre' => $request->nombre,
                  'email' => $request->email,            
                  'img_url' => $request->img_url]
        );

        return redirect()->route('integrantes.index');

    }

    public function edit($itg)

    {
       
        $editable=Integrantes::where('id_integrante', $itg)->first();
        

        return view('crud.integrantes.editarI',compact('editable'));
    }

    public function destroy($id)
    {
        //
         Integrantes::where('id_integrante',$id)->delete();
        return redirect()->route('integrantes.index');
    }
    //BORRAR
       // Integrantes::where('id_integrante', $itg)->delete();


 
}