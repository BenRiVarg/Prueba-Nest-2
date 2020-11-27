<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicios;

class ControladorServicios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios=Servicios::all();
        return view('crud.servicios.indexsrvc')->with('servicios',$servicios); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.servicios.crearServicio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'posicion'=>'required', 'img_url'=>'required']);
        Servicios::create($request->all());
        return redirect()->route('Servicios.index')->with('success','Registro creado satisfactoriamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio=Servicios::where('id_servicio', $id)->first();
        return view('crud.servicios.editarServicio',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required', 'posicion'=>'required', 'img_url'=>'required']);
        
        Servicios::where('id_servicio', $id)->update([
         'nombre' => $request->nombre,
         'posicion'=>$request->posicion,
         'img_url '=>$request->img_url
        ]);

        return redirect()->route('Servicios.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicios::where('id_servicio', $id)->delete();
        return redirect()->route('Servicios.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
