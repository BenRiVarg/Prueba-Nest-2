<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;

class UserController extends Controller
{


    public function index()
    {   //visualización
        $usuarios=User::all();
        return view('crud.usuarios.index')->with('usuarios',$usuarios);
    }

   

    public function create(){
       return view('crud.usuarios.save');
    }

    public function store(Request $request){
        User::create($request->all());
        return redirect()->route('User.index')->with('success','Registro creado satisfactoriamente');
    }

    public function edit($id){
        $usuario=User::where('id', $id)->first();
        return view('crud.usuarios.edit',compact('usuario'));
    }

    public function update(Request $request, $id){
        User::where('id', $id)->update([
            'name' => $request->name,
            'email'=>$request->email,
            'id_rol'=>$request->id_rol
           ]);
   
           return redirect()->route('User.index')->with('success','Registro actualizado satisfactoriamente');
    }
    
    public function destroy($id)
    {
        User::where('id_servicio', $id)->delete();
        return redirect()->route('crud.usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
