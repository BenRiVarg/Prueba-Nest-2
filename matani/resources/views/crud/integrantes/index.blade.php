@extends('plataforma.layout')


@section('title') Integrantes @stop

@section('content')
<div>
<h1>Entrando al crud de Integrantes</h1>
<h3 >
Aquí se deberían de ver los integrantes: 
</h3>

<div style="border: solid;">
	<table>
			@foreach ($integrantes as $itg)

				<tr>

					<td>{{ $itg->id_integrante }}</td>

					<td>{{ $itg->nombre }}</td>

					<td>{{ $itg->email }}</td>

					<td>{{ $itg->img_url }}</td>

					<td><a href="{{route('integrantes.edit',$itg->id_integrante)}}">Editar</a></td>
					<td>
					<form action="{{action('IntegrantesController@destroy', $itg->id_integrante)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
				  </td>
				</tr>

			@endforeach
	</table>

	
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                            
</div>

<a href="{{ route('integrantes.create') }}">Crear Integrante</a>
</div>

</body>
@stop