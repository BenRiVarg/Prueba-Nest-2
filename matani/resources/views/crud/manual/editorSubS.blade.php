@extends('plataforma.layout')


@section('title') Editor de SubSecciones @stop
@section('head')
{{Html::style('assets/css/matani/administrador/crearFaq.css', array('media'=>'screen'))}}
{{ HTML::style('assets/css/matani/administrador/subSeccion.css') }}

@stop
@section('content')
@php
//Creación de "id" dinamico para los editores de Img
$idEditor="EI";
$numEI=1;
@endphp
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">
                                      
                                        <div class="pull-left">
                                            <h1 class="title">Modificar SubSección</h1>                           
                                        </div>

                                    

                                    </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <section class="box ">
                                        <header class="panel_header">
                                        
                                        </header> 
                                    
<form action="{{route('crudM.update',$SubSeccion)}}" method="POST"  enctype="multipart/form-data" id="editor" >
@method('PATCH')
<input type="hidden" name="indicador" value="subseccion">
{{ csrf_field() }}
@csrf
<div class="subS">
<h3 class="tituloSub">{{$elementos->nombre}}</h3>
                                                        @for($k=0;$k<=count($elementos->tipo)-1;$k++)

                                                                @php
                                                                //Selección del tipo de elemento por iteración (texto, imagen , etc)
                                                                $tipo=$elementos->tipo[$k];
                                                                @endphp
                                                                
                                                                {{--Renderizado del elemento de acuerdo al tipo en cada iteración--}}
                                                                @switch($tipo)
                                                                @case('t')
                                                                @php
                                                                   
                                                                    //Variable para poner id's dinamicos para los ids de las Imágenes
                                                                    $id="eT".$k;
                                                                @endphp
                                                                    <div class="form-group editorT "id="{{$id}}">

                                                                    <label class="form-label" for="field-6">Modifica tu parrafo </label>

                                                                    <div class="controls">
                                                                        <textarea class="form-control ta manual" cols="5" id="field-6" placeholder="Texto en bruto para el Manual" name="texta" >{{$elementos->contenido[$k]}}</textarea>
                                                                    </div>
                                                                    </div>
                                                                    @break
                                                                @case('se')
                                                                <div id="sei">
                                                                <input type="hidden" class=" superEditor manual">
                                                                    <div class="row "   ><!-- style="visibility:collapse;-->
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                                                            <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" id="edit">{{$elementos->contenido[$k]}}</textarea>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                                @break
                                                                
                                                                @case('i')
                                                                @php
                                                                    //Variable para nombrar dinamicamente cada hidden y poder recupararlo
                                                                    $nom="iSm".$k;
                                                                    //Variable para poner id's dinamicos para los ids de las Imágenes
                                                                    $id=$idEditor.$numEI;
                                                                @endphp
                                                                <div class="ImgEditor manual">
                                                                
                                                                    {{--Editor de Imágenes--}}
                                                                    <img src="{{url('storage/temporal/'.$elementos->contenido[$k])}}" class="editable" alt="imagen 1"  />
                                                                    <input type="hidden"  name="{{$nom}}" value="{{$elementos->contenido[$k]}}">
                                                                    <h4 onclick="editarImg(event)" id="{{$id}}">Editar</h4>
                                                                    <h4 class="EI">Eliminar</h4>
                                                                </div>
                                                                    
                                                                    @php
                                                                    //Incremento de la variable para el próximo elemento
                                                                    $numEI++;
                                                                @endphp

                                                                    @break

                                                                @default
                                                                <p>Hay un error de Visulazación</p>
                                                                @endswitch
                                                        @endfor
                                                                                    <div id="insercion"><!--Inserción de Elementos-->
                                                                                    </div>
                                                                            </div>
                                                        <div class="col-md-3 bottom15 right15">
                                                        <input type="button" class="btn btn-success btn-lg" value="Guardar Cambios de la Subsección" onclick="envioEspecializado()">
                                                        </div>  
                                                    </form>
                                                    <div class="herramientas">
                                                            <button onclick="textArea()">Crear TextArea</button>
                                                            <button onclick="crearImg()">Crear Imagen</button>
                                                            <button  class="bg-danger" onclick="destruir()">Borrar Elemento</button>

                                                    </div>
                                                
 {{--         Editor con wythtml5 
<div class="form-group">

                                            <label class="form-label" for="field-6">Prueba de fuego para cada caso</label>
                                     
                                            <div class="controls">
                                                <textarea class="form-control agregadoCF" cols="5" id="field-6" placeholder="Texto en bruto para el Manual" name="texta" >@php echo $compilado;@endphp</textarea>
                                            </div>
                                        </div>
                                        --}}

                                        </section>  
                                    </div>
                         </div>
<div>



                                        
</div>
@stop
@section('moreJs')
{{ HTML::script('assets/js/matani/admin/editarSubS.js', ["type" => "text/javascript"]) }}
@stop