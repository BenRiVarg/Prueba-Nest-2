@extends('plataforma.layout')


@section('title') Editar Faqs @stop
@section('content')
<div>

@if(isset($seccion))<!--Opcion envio de Seccion-->
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Editor de Nombre de Seccion</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                        @php
                                        $upSecc="upSeccSS".$seccion->id_SF;
                                        @endphp
                                        <form action="{{route('crudF.update',$upSecc)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label class="form-label text-primary" for="field-1">Nombre Sección</label>
                                            
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" name="nomSecc" value="{{$seccion->nombre}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 bottom15 right15"><input type="submit" class="btn btn-purple btn-lg" value="Modificar Seccion"></div>
                                        </form>
                        </section></div>

                       
                        
</div>
@else<!--Opcion envio de Faq-->
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Editor de Faqs</h1>                            </div>

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                              
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                    @php

                                       $upFaq="upFaqSS".$faq->idFaq;
                                    @endphp
                                        <form action="{{route('crudF.update',$upFaq)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Titulo Faq</label>
                                            <span class="desc">Pregunta que le aparecerá al usuario</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" name="nomFaq" value="{{$faq->nombre}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Contenido de la Faq</label>
                                           
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" id="field-6" placeholder="Contenido de Respuesta a la Faq" name="cont">{{$faq->contenido}}</textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-3 bottom15 right15"><input type="submit" class="btn btn-purple btn-lg" value="Modificar"></div>
                                        </form>
                        </section></div>

                       
                   
@endif
</div>
@stop