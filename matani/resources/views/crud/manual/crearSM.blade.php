@extends('plataforma.layout')


@section('title') Crear Nueva Seccion @stop
@section('head') {{ HTML::style('assets/css/matani/administrador/crearSM.css') }}  @stop
@section('content')
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Crear Nueva Sección</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                            <form action="{{route('muestraM')}}" method="POST"  enctype="multipart/form-data" id="manualForm">
                            <input type="hidden" name="manual" value="{{$id}}">
                            <input type="hidden" name="indicador" value="temporal"><!-- Elemento que define como se guarda-->
                                        {{ csrf_field() }}
                                        @csrf
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        <div class="form-group">
                                            <label class="form-label tituloSeccion" for="field-1">Nombre de la Sección</label>
                            
                                            <div class="controls">
                                                <input type="text" class="form-control " id="field-1" name="nomSecc" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-8 col-sm-9 col-xs-10 col-lg-12">
                                        <div class="subS" id="sub0">
                                            <div class="form-group">
                                                <label class="form-label text-primary tituloSub" for="field-1">Titulo de la SubSección</label>
                                
                                                <div class="controls">
                                                    <input type="text" class="form-control nombreSub manual" id="field-1"  required>
                                                </div>
                                                <div id="sei">
                                                    <input type="hidden" class=" superEditor manual">
                                                        <div class="row "   ><!-- style="visibility:collapse;-->
                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" id="editor">Hackiando el editor</textarea>
                                                            </div>
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
                                        <input type="button" class="btn btn-success btn-lg" value="Añadir Sección" onclick="envioEspecializado()">
                                        <!--<input type="button" class="btn btn-success btn-lg" value="Guardar Sección" onclick="envioClasificador()">-->
                                        </div>
                                        
               
                                </form><!--Termina Formulario-->
                                <div class="container" >
                                    <div class="row position-static ">
                                    <div class="col-md-8 col-sm-9 col-xs-10 col-lg-8 ">
                                        <button onclick="destruir()" class="bg-danger">Eliminar Elemento</button>
                                        <button onclick="textAreaD()">Crear TextArea</button>
                                        <button onclick="crearImgD()">Crear Imagen</button>
                                        <button onclick="subSeccion()" class="bg-primary">Añadir Subsección</button>
                                    </div>
                                </div>
                       
               
 


@stop

@section('moreJs')
{{ HTML::script('assets/js/matani/admin/crearSeccion.js', ["type" => "text/javascript"]) }}

@stop