@extends('plataforma.layout')


@section('title') Crear Integrante @stop

@section('content')
<div>
<h1>Ingresa los datos del nuevo integrante:</h1>


<form action="{{route('integrantes.store')}}" method="POST">
@csrf

<div class="col-lg-6">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Crear Nuevo Integrante</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <form id="msg_validate" action="javascript:;" novalidate="novalidate">

                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Nombre</label>
                                                <span class="desc">e.g. "Beautiful Mind"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield1" name="nombre" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield2">Correo</label>
                                                <span class="desc">e.g. "some@example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield2" name="correo" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield3">Imagen</label>
                                                <span class="desc">e.g. "imagen.jpg"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield3" name="imagen" >
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success">Crear</button>
                                               
                                            </div>
                                        </form>





                                    </div>
                                </div>
                            </div>
                        </section></div>
</form>

</div>
@stop

</body>

</html>