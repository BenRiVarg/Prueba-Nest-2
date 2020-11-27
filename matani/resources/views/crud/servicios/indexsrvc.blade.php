@extends('crud.servicios.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Servicios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{route('Servicios.create')}}" class="btn btn-info" >Añadir Servicio</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Posición</th>
               <th>Link imagen</th>
             </thead>
             <tbody>
              @if($servicios->count())  
              @foreach($servicios as $srvc)  
              <tr>
                <td>{{$srvc->nombre}}</td>
                <td>{{$srvc->posicion}}</td>
                <td>{{$srvc->img_url}}</td>
            
                <td><a class="btn btn-primary btn-xs" href="{{action('ControladorServicios@edit', $srvc->id_servicio)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ControladorServicios@destroy', $srvc->id_servicio)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
     
    </div>
  </div>
</section>

@endsection