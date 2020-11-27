@extends('plataforma.layout')


@section('title') Usuarios @stop

@section('content')

    @php
    $contador=1;
    @endphp
    <div>
    

    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Usuarios dados de Alta</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <table class="table table-striped">
                                            <thead>
                                         
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Rol</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  @foreach ($usuarios as $usr)

                                                        <tr>
                                                            <th scope="row" >{{$contador}}</th>

                                                            <td>{{ $usr->name }}</td>

                                                            <td>{{ $usr->email}}</td>

                                                            <td>{{ $usr->id_rol }}</td>

                                                            <td><a href="#">Opciones</a></td>
                                                        </tr>
                                                        @php
                                                        $contador++;
                                                        @endphp
                                                @endforeach
                                               
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </section></div>


    <a href="{{route('usuarios.registro')}}">Crear un nuevo usuario</a>
    </div>


@stop
