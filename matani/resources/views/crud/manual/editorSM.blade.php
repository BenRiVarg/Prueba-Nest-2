@extends('plataforma.layout')


@section('title') Modificación de Secciones @stop
@section('head') {{ HTML::style('assets/css/matani/administrador/subSeccion.css') }} @stop
@section('content')

@if( $caso==="nSeccion")
<h1>Editar Nombre de Sección</h1>

<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                             <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-md-8 col-sm-9 col-xs-10">
                                            <form action="{{route('crudM.update',$seccion->idSecc)}}" method="POST"  enctype="multipart/form-data" >
                                                <input type="hidden" name="indicador" value="Nseccion">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-label text-primary" for="field-1">Titulo de la SubSección</label>
                                        
                                                        <div class="controls">
                                                            <input type="text" class="form-control " id="field-1"  value="{{$seccion->nombreSecc}}" name="titulo"required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="seccion" value="{{$seccion->idSecc}}">    
                                                <input type="submit" class="btn btn-success btn-lg" value="Guardar Cambio en  Sección">
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </section>
</div>


@else
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Editar Sección</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                            <form action="{{route('crudM.update',$seccion->idSecc)}}" method="POST"  enctype="multipart/form-data" id="manualForm">
                            @method('PATCH')
                            <input type="hidden" name="indicador" value="seccion"><!-- Elemento que define como se guarda-->
                                        {{ csrf_field() }}
                                        @csrf
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        <h1 class="tituloSeccion">{{$seccion->nombreSecc}}</h1>

                                        <div class="subS" id="sub0">
                                            <div class="form-group">
                                                <label class="form-label tituloSub" for="field-1">Titulo de la SubSección</label>
                                
                                                <div class="controls">
                                                    <input type="text" class="form-control nombreSub manual" id="field-1"  required>
                                                </div>
                                            </div>
                                            <div id="sei">
                                                <input type="hidden" class=" superEditor manual">
                                                    <div class="row "   >
                                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                                            <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" id="editor">Hackiando el editor</textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('nomSecc')}}</b></p>

                                      
                                       

                                       
                                       
                                        
                                    </div>

                                    
                                </div>
                                <div id="insercion">
                           
                                <!--Insertos de elementos-->
                                </div>
                                
                          
                                        <div class="col-md-3 bottom15 right15">
                                        <input type="button" class="btn btn-success btn-lg" value="Editar Sección" onclick="envioEspecializado()">
                                       
                                        </div>
                                        
                                </form><!--Termina Formulario-->
                                <button onclick="destruir()" class="bg-danger">Eliminar Elemento</button>
                                <button onclick="textAreaD()">Crear TextArea</button>
                                <button onclick="crearImgD()">Crear Imagen</button>
                                <button onclick="subSeccion()" class="bg-primary">Crear Subsección</button>
                          
@endif

@stop

@section('moreJs')
{{ HTML::script('assets/js/matani/admin/crearSeccion.js', ["type" => "text/javascript"]) }}

@stop