@extends('plataforma.layout')


@section('title') Crear Nuevas Faqs @stop
@section('head')
{{Html::style('assets/css/matani/administrador/crearFaq.css', array('media'=>'screen'))}}
@stop
@section('content')
<div>
@if(isset($idS))
<div>
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Añadir Faqs</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                            <form action="{{route('crudF.store')}}" method="POST" id="faqsForm">
                            <input type="hidden" name="seccion" value="{{$idS}}">
                                        @csrf
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Titulo Faq</label>
                                            <span class="desc">Pregunta que le aparecerá al usuario</span>
                                            <div class="controls">
                                                <input type="text" class="form-control agregadoTF" id="field-1" name="nomFaq" required>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('tf0')}}</b></p>

                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Contenido de la Faq</label>
                                     
                                            <div class="controls">
                                                <textarea class="form-control agregadoCF" cols="5" id="field-6" placeholder="Contenido de Respuesta a la Faq" name="cont" required></textarea>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('cf0')}}</b></p>
                                       
                                        
                                    </div>
                                </div>
                                <div id="insercion">
                                <!--Insertos de secciones-->
                                </div>
                                <div class="col-md-3 bottom15 right15"><button type="button" class="btn btn-purple btn-border" onclick="crearFaq()">Añadir Faq</button></div>
                                        <br>
                                        <div class="col-md-3 bottom15 right15">
                                        <input type="button" class="btn btn-success btn-lg" value="Guardar Cambios en Sección" onclick="envioClasificador()"></div>
                                        
                                </form><!--Termina Formulario-->
</div>
@else
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Crear nueva Sección</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                            <form action="{{route('crudF.store')}}" method="POST" id="faqsForm">
                            <input type="hidden" name="manual" value="{{$idM}}">
                                        @csrf
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        <div class="form-group">
                                            <label class="form-label text-primary" for="field-1">Nombre Sección</label>
                            
                                            <div class="controls">
                                                <input type="text" class="form-control " id="field-1" name="nomSecc" required>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('nomSecc')}}</b></p>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Titulo Faq</label>
                                            <span class="desc">Pregunta que le aparecerá al usuario</span>
                                            <div class="controls">
                                                <input type="text" class="form-control agregadoTF" id="field-1" name="nomFaq" required>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('tf0')}}</b></p>

                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Contenido de la Faq</label>
                                     
                                            <div class="controls">
                                                <textarea class="form-control agregadoCF" cols="5" id="field-6" placeholder="Contenido de Respuesta a la Faq" name="cont" required></textarea>
                                            </div>
                                        </div>
                                        <p class="errorMatani"><b>{{$errors->first('cf0')}}</b></p>
                                       
                                        
                                    </div>
                                </div>
                                <div id="insercion">
                                <!--Insertos de secciones-->
                                </div>
                                <div class="col-md-3 bottom15 right15"><button type="button" class="btn btn-purple btn-border" onclick="crearFaq()">Añadir Faq</button></div>
                                        <br>
                                        <div class="col-md-3 bottom15 right15">
                                        <input type="button" class="btn btn-success btn-lg" value="Guardar Sección" onclick="envioClasificador()"></div>
                                        
                                </form><!--Termina Formulario-->
                                
                                  <!---->
    
        
</div>
@endif
@stop
@section('moreJs')

{{ HTML::script('assets/js/matani/admin/crearFaq.js')}}
<script src=" {{url('assets/js/scripts.js')}}" type="text/javascript" async></script> 
@stop