
@extends('plataforma.usr')

@section('title') Preguntas Frecuentes @stop
@section('head') {{ HTML::style('assets/css/matani/cliente/faqs.css') }}@stop
@section('tituloManual')<h1 id="tituloManual">{{$nombre}}</h1>@stop
@section('barra')
<a href="{{route('index')}}">Regresar a Manuales</a>
<a href="#">Contácto</a>
@stop
@section('content')

           <!-- Bootstrap FAQ - START -->




    <div class="bg-ligth">
            <div class="panel-group faq-panels" >
                                @php
                                $i=0;
                                @endphp
                                @for($s=0;$s<=count($nombreSecc)-1;$s++)
                                        <h3 class="seccionFaq">{{$nombreSecc[$s]}}</h3>

                                        @php
                                        $registro=$faqs[$s];
                                        @endphp
                                        @foreach($registro as $faq)
                                                @php
                                                $identificador="fa".$i;
                                                $ref="#".$identificador;
                                                $i++;
                                                @endphp    
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a class="accordion-toggle collapsed " data-toggle="collapse" data-parent="#accordion" href="{{$ref}}" >{{$faq->nombre}}</a>
                                                                    </h4>
                                                                </div>
                                                                <div id="{{$identificador}}" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <p>{{$faq->contenido}}</p>
                                                                    </div>
                                                    </div>
                                                </div>
                                        @endforeach                  
                                @endfor
                                
            <div class="container">
                <div class="row">
                  <!-- Formulario para contraseña de Manual-->
                    <section class="box ">
                                                <header class="panel_header clave" >
                                                
                                                    <h2 class="title pull-left tipoClave ">Acceso al Manual</h2>
                                                
                                                </header>
                                                <div class="content-body">
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-9 col-xs-10">
                                                    </div>
                                                    <form action="{{route('manual',$id)}}" method="POST">
                                                    <div class="form-group">
                                                        <label class="form-label  pull-left " for="field-2">Contraseña</label>
                                                        <span class="desc">clave proporcionada por tu administrador</span>
                                                        <div class="controls">
                                                            @csrf
                                                            <input type="password" value="Cre@t!v!ty" class="form-control" id="field-2" name="clave">
                                                            <p class="errorMatani"><b>{{$errors->first('clave')}}</b></p>
                                                            <input type="hidden" name="id" value={{$id}}>
                                                        </div>
                                                    </div>
                                                    <input type="submit" value="Acceder al Manual" class="btn btn-info">
                                                    </form>
                                                   <!-- <a href="{{route('manual',$id)}}" class="btn btn-danger">Acceso Sin filtro</a>-->
                                                    </div>
                                    </div>


                                </div>
                            </section>
                </div>
            </div>

            </div>
    </div>
    
                         

@stop