@extends('plataforma.layout')


@section('title') Portal de Administradores @stop

@section('content')

    <div>
     <h1>Bienvenido al Portal de Administradores</h1>

     <div class="row center-block mx-auto">
                                   
                                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-book icon-md icon-rounded icon-primary'></i>
                                            <div class="stats">
                                                <h4><strong>{{$contadorManuales}}</strong></h4>
                                                <span>Manuales Dados de Alta</span>
                                            </div>
                                        </div>
                                    </div>
                              
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-users icon-md icon-rounded icon-primary'></i>
                                            <div class="stats">
                                                <h4><strong>{{$usuarios}}</strong></h4>
                                                <span>Administradores dados de alta</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End .row -->	
     
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Lista de Manuales</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                    <th>#</th>
                                                    <th>Nombre Manual</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            @foreach($manuales as $manual)
                                            <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$manual->nombre}}</td>
                                                    <td>
                                                    <div class="btn-group btn-group-justified"> 
                                                    @if($estadoManuales[$loop->index]['estadoManual']<=0) 
                                                    <a type="button" class="btn btn-danger" href="{{route('indexCM',$manual->id)}}">Manual</a>      
                                                    @else
                                                    <a type="button" class="btn btn-purple" href="{{route('indexCM',$manual->id)}}">Manual</a>
                                                    @endif

                                                    @if($estadoManuales[$loop->index]['estadoFaqs']<=0) 
                                                    <a type="button" class="btn btn-danger" href="{{route('indexCF',$manual->id)}}">Faqs</a>  
                                                    @else
                                                    <a type="button" class="btn btn-primary" href="{{route('indexCF',$manual->id)}}">Faqs</a>
                                                    @endif
 
                                                   </div>
                                                    </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        

                                    </div>
                                        <div class="center-block">
                                          <div class="col-md-3 bottom15 right15 center-block"><a href="{{route('crudM.create')}}"type="button" class="btn btn-info btn-border">Crear Nuevo</a></div>
                                        </div>
                                </div>
                            </div>

                           
                                  
                            
                        </section></div>
                        
    </div>


@stop
