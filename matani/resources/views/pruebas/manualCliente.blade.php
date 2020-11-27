<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estiloma.css">
	<title>Manual para el cliente </title>
</head>
<header>
<img src="/img/logo matani.jpg" alt="matani fallido"  id="lmatani">
<img src="/img/fraktal.png" alt="fraktal fallido" id="lfraktal">

</header>

<body>
    <h1 id="tituloManual"> Entrando a la visión del manual para los clientes</h1>
    <nav>
        <p>secciones</p>
        <p>buscar una sección</p>
    </nav>
    <div class="seccion">

        


        <h3 class="titulo">TITULO</h3>  
        
        <p>Este sería el contenido de la sección que muestra los contenidos que se guardan en la base de datos</p>
       <p><b>Texto Capturado : </b>{{$resultado[1]}}</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid sit animi eos laborum incidunt at corporis quisquam, amet accusantium cupiditate. Hic quis sint dicta optio odit in at dolorum quam?</p>

        <img src="{{url('storage/temporal/'.$resultado[0])}}" alt="imagen 1"  />
        <img src="{{url('storage/temporal/'.$resultado[2])}}" alt="imagen 2"  />
        
    </diV>
        
   
</body>
</html>
