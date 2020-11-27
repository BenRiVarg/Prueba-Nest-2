<!DOCTYPE html>
<html>
<head>
	<title>Crear Integrante</title>
</head>
<body>
<h1>Editar los datos del integrante:</h1>
<br>
<h1>Id:</h1>


<div style="border: solid;">
<form action="{{route('integrantes.update',$editable->id_integrante)}}" method="POST">
@csrf
@method('PUT')
Nombre: <input type="text" value="{{$editable->nombre}}" name="nombre" >
Correo:<input type="email" value="{{$editable->email}}"name="email">
Imagen:<input type="text" value="{{$editable->img_url}}" name="img_url">
<input type="submit" value="enviar">
</form>
</div>

</body>

</html>