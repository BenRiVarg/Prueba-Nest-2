@extends('plataforma.layout')


@section('title') {{$manual->nombre}} @stop
@section('head')
{{Html::style('assets/css/matani/administrador/listado.css', array('media'=>'screen'))}}
@stop
@section('manual') {{$manualr=$id}}@stop
@section('content')
<div>
    <div class="col-lg-12">
                            <section class="box ">
                                <header class="panel_header">
                                    <h2 class="title pull-left">Secciones del Manual</h2>
                                    <div class="actions panel_actions pull-right">
                                        <i class="box_close fa fa-times"></i>
                                    </div>
                                </header>
                            
                                <div class="content-body">    
                                <a href="{{route('admin.manual',$id)}}" class="text-purple">
                                    <i class="fa fa-eye icon-purple"></i>
                                    <span class="title">{{ trans('Ir a vista de usuario') }}</span>
                                </a>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="tituloM">#</th>
                                                            <th class="tituloM"><b>{{$manual->nombre}}</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     
                                                    @for($i=0;$i<=count($manual->secciones)-1;$i++)
                                                    <tr class="primary">
                                                    <th scope="row">{{$i+1}}</th>
                                                    
                                                    <td>{{$manual->secciones[$i]->nombreScc}}</td>
                                                    <td>
                                                    @php
                                                    //Edición del Título de una sección
                                                    $editor1="nomSeccEE".$manual->secciones[$i]->idSecc;
                                                    @endphp
                                                    <a href="{{route('crudM.edit', $editor1)}}">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="title">{{ trans('Editar') }}</span>
                                                            </a>
                                                    </td>
                                                    <td>
                                                    @php
                                                    $editor2="incrementoSeccEE".$manual->secciones[$i]->idSecc;
                                                    @endphp
                                                    <a href="{{route('crudM.edit',$editor2)}}">
                                                                <i class="fa fa-arrow-up"></i>
                                                                <span class="title">{{ trans('Añadir Subsecciones') }}</span>
                                                            </a>
                                                    </td>
                                                    </tr>
                                                        @for($j=0;$j<=count($manual->secciones[$i]->subScc)-1;$j++)
                                                            <tr>
                                                                <th scope="row">{{$j+1}}</th>
                                                                <td>{{$manual->secciones[$i]->subScc[$j]->nombre}}</td>
                                                                <td>
                                                                @php
                                                                $editor3="editSubSEE".$manual->secciones[$i]->subScc[$j]->subSccID;
                                                                @endphp
                                                                <a href="{{route('crudM.edit',$editor3)}}">
                                                                    <i class="fa fa-edit"></i>
                                                                    <span class="title">{{ trans('Editar') }}</span>
                                                                </a>
                                                                </td>
                                                                <td>
                                                                @php
                                                                $destructor2="destruirSubDD".$manual->secciones[$i]->subScc[$j]->subSccID;
                                                                @endphp
                                                                <form action="{{action('ControladorManuales@destroy', $destructor2)}}" method="post">
                                                                {{csrf_field()}}
                                                                @method('DELETE')
                                                             
                                            
                                        
                                                                <button class=" eliminacion " type="submit"> <i class="fa fa-times-circle"></i><span class="title">{{ trans('Borrar') }}</span></button>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endfor
                                                    </tbody>
                                                </table>
                                        
                                            </div>
                                            <div class="center-block">
                                                <div class="col-md-3 bottom15 right15 center-block">
                                                <a type="button" class="btn btn-info btn-border" href="{{route('nuevaSeccionM',$id)}}">Crear Nueva Seccion</a>
                                                
                                                </div>
                                            </div>
                                    </div>
                                    
                                </div>     
                            
                            </section>
                            
                    </div>
                                          
</div>
@stop