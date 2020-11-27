@extends('plataforma.layout')


@section('title') {{$nombreM}}--Faqs @stop
@section('head')
{{Html::style('assets/css/matani/administrador/listado.css', array('media'=>'screen'))}}
@stop
@section('manual'){{$manualr=$idM}}@stop
@section('content')
<div>
    <div class="col-lg-12">
                            <section class="box ">
                                <header class="panel_header">
                                    <h2 class="title pull-left">Listado De Faqs</h2>
                                    <div class="actions panel_actions pull-right">
                                        <i class="box_close fa fa-times"></i>
                                    </div>
                                </header>
                            
                                <div class="content-body">    
                                <a href="{{route('cliente.faqs',$idM)}}" class="text-purple">
                                    <i class="fa fa-eye icon-purple"></i>
                                    <span class="title">{{ trans('Ir a vista de usuario') }}</span>
                                </a>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="important">
                                                            <th    class="tituloM">#</th>
                                                            <th  class="tituloM"><b>{{$nombreM}}</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($Secc as $scc)
                                                    <tr class="primary">
                                                    <th scope="row"><b>{{$loop->iteration}}</b></th>
                                                    
                                                    <td><b>{{$scc->nombre}}</b></td>
                                                    <td>
                                                    @php
                                                    $nomSecc="nomSeccSS".$scc->id_SF;
                                                    @endphp
                                                    <a href="{{route('crudF.edit', $nomSecc)}}">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="title">{{ trans('Editar') }}</span>
                                                            </a>
                                                    </td>
                                                    <td>
                                                    @php
                                                    $Secc="SeccSS".$scc->id_SF;
                                                    @endphp
                                                    <a href="{{route('createCF',$Secc)}}">
                                                                <i class="fa fa-arrow-up"></i>
                                                                <span class="title">{{ trans('Añadir Faqs') }}</span>
                                                            </a>
                                                    </td>
                                                    </tr>
                                                    @php
                                                    $registro=$faqs[$loop->index];
                                                    $i=1;
                                                    @endphp
                                                        @foreach($registro as $faq)
                                                            <tr>
                                                                <th scope="row">{{$loop->iteration}}</th>
                                                                <td>{{$faq->nombre}}</td>
                                                                <td>
                                                                @php
                                                                $nomFaq="nomFaqSS".$faq->idFaq;
                                                                @endphp
                                                                <a href="{{route('crudF.edit',$nomFaq)}}">
                                                                    <i class="fa fa-edit"></i>
                                                                    <span class="title">{{ trans('Editar') }}</span>
                                                                </a>
                                                                </td>
                                                                <td>
                                                                <form action="{{action('ControladorFaqs@destroy', $faq->idFaq)}}" method="post">
                                                                {{csrf_field()}}
                                                                @method('DELETE')
                                                             
                                            
                                        
                                                                <button class=" eliminacion " type="submit"> <i class="fa fa-times-circle icon-primary"></i><span class="title">{{ trans('Borrar') }}</span></button>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                        
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                        
                                            </div>
                                            <div class="center-block">
                                                <div class="col-md-3 bottom15 right15 center-block">
                                                <a type="button" class="btn btn-info btn-border" href="{{route('createCF',$idM)}}">Crear Nueva Seccion</a>
                                                
                                                </div>
                                            </div>
                                    </div>
                                    
                                </div>     
                            
                            </section>
                            
                    </div>
                                          
</div>
@stop