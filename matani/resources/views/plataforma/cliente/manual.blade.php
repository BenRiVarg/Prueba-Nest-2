@extends('plataforma.usr')


@section('title') Manuales @stop
@section('head')     {{ HTML::style('assets/css/matani/cliente/manual.css') }} @stop
@section('tituloManual')<h1 id="tituloManual">{{$nombre}}</h1>@stop
@section('barra')
<a href="{{route('index')}}">Regresar a Manuales</a>
<a href="{{route('cliente.faqs',$id)}}">Preguntas Frecuentes</a>
<a href="#">Contácto</a>
@stop
@section('content')


    <div>

          <div class="containter">
            <div class="row">
            <div class="col-lg-12">
                
               
                            <div class="row ">
                                <div class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-9 col-lg-offset-3 tocify-content contenedor">
                                @for($i=0;$i<=count($secciones)-1;$i++)
                                            {{--Desplegado del nombre de la Sección--}}
                                            <h2 class="tituloSeccion" >{{$secciones[$i]->nombreScc}}</h2>
                                            
                                            {{--Renderizado de las subsecciones por sección--}}
                                              @for($j=0;$j<=count($secciones[$i]->subScc)-1;$j++)

                                               <h3 class="tituloSub" >{{$secciones[$i]->subScc[$j]->nombre}}</h3>
                                                        @for($k=0;$k<=count($secciones[$i]->subScc[$j]->tipo)-1;$k++)

                                                                @php
                                                                //Selección del tipo de elemento por iteración (texto, imagen , etc)
                                                                $tipo=$secciones[$i]->subScc[$j]->tipo[$k];
                                                                @endphp
                                                                
                                                                {{--Renderizado del elemento de acuerdo al tipo en cada iteración--}}
                                                                @switch($tipo)
                                                                @case('t')
                                                                    <p class="justificado">{{$secciones[$i]->subScc[$j]->contenido[$k]}}</p>
                                                                    @break
                                                                @case('se')
                                                                    @php
                                                                    print_r($secciones[$i]->subScc[$j]->contenido[$k]);
                                                                    @endphp
                                                                    @break
                                                                @case('i')
                                                                    <img src="{{url('storage/temporal/'.$secciones[$i]->subScc[$j]->contenido[$k])}}" alt="imagen 1"  />
                                                                    @break

                                                                @default
                                                                <p>Hay un error de Visulazación</p>
                                                                @endswitch
                                                        @endfor
                                                        
                                                @endfor
                                                
                                            @endfor
                                </div>
                              
                            </div>
            </div>
        </div>
    </div>
</div>
                            

           


@stop
@section('moreJs')

{{ HTML::script('assets/plugins/jquery-ui/smoothness/jquery-ui.min.js') }}
{{ HTML::script('assets/plugins/tocify/js/jquery.tocify.js') }}

<script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/tocify/js/jquery.tocify.js" type="text/javascript"></script>
<!---->
<!--<script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/tocify/js/jquery.tocify.js" type="text/javascript"></script>-->
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

@stop