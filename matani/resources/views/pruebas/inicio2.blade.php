<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="inicio.css">
	<title>Prueba</title>
	<style>
	.penvio {border: solid;
			padding: 5px;
			overflow:auto;
			}

	.texto{width: 60%;
		   float: left;}

	.imagen{width: 20%;
			float: left;
			margin:auto;
	}

	aside {float:left;
			width:30%;
			background-color: cyan;
			height: 100%;}

	content{float:left;
			width:70%;}
	</style>
</head>
<body>
<header><h1>Entrando Matani</h1></header>
<aside>
<button onclick="crearTxt()">Crear Texto</button>
<button onclick="crearImg()">Crear Imagen</button>
<button onclick ="crear2()"> crear Formulario</button>
<button onclick ="muertecaz()"> Eliminar elementos del cazador</button>
<button onclick ="contador()">Contador de Nuevos elementos</button>
</aside>
<content>
<div style="border: solid;
padding: 5px;">
	<div class="info">
		<h3>Información</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>



	<form action="/media" enctype="multipart/form-data" method="post">
		{{ csrf_field() }}
		<input type="file" name="file">
		<button type="submit">Upload</button>
	</form>
</div>	
<br>
<br>

<div class="penvio" id="pvio">
	<form action="/penvio" enctype="multipart/form-data" method="post">
		

			{{ csrf_field() }}
			<input type="file" name="file" class="imagen">
			<div class="texto">
				<h3>Texto de envío</h3>
				<input type="text" size="200" style="heigth:10%;" name="texto">	
			</div>
		@csrf
		<button type="submit" >Enviar a manual</button>
		</form>
</div>	
</content>
<svg onclick="borrar()">
<rect width="30" height="30" style="fill:rgb(0,0,255);stroke-width:2;stroke:rgb(255,255,255)" />
<text fill="#ffffff" font-size="45" font-family="Verdana" x="10" y="10">X</text>
</svg>


<!--Este es el chido-->
<form action="/editorM"  id="myForm"  enctype="multipart/form-data" method="post">
{{ csrf_field() }}
@csrf
<div id="prueba">

</div>
<input type="button" onclick="myFunction()" value="Submit form">
<!--<input type="submit">-->


</form>

<div onclick="cazador(event)">

<p id="1">Probando</p>
<p id="2">El disparador</p>
<p id="3">de Eventos</p>
</div>

<!-- <i class="pull-right left-exit fa fa-close icon-danger icon-lg"></i>
Esta es la x que tenias en el layout
--> 
<!-- INFORMACIÓN IMPORTANTE
Controlador de  editor TextArea
<textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>

-->
<script>

		function crearTxt(){

		
		var text=document.createElement("INPUT");
		text.type="text";
		text.className="t manual";
		document.getElementById("prueba").appendChild(text);

		}

		function crearImg(){

			
			var imagen=document.createElement("INPUT");
			imagen.type="file";
			imagen.name="file";
			imagen.className="i manual";
			document.getElementById("prueba").appendChild(imagen);
		}

		
		function borrar(){
			var elemento=document.getElementsByClassName("penvio");
			elemento[0].remove();

		
		}

		function crear(){
		var nombrar="neonato";
		var prueba= document.getElementById("prueba");

		var imagen=document.createElement("INPUT");
			imagen.type="file";
			imagen.name="multimedia";
			prueba.appendChild(imagen);


		var text=document.createElement("INPUT");
		text.type="text";
		text.name=nombrar;
		prueba.appendChild(text);
		}

		function crear2(){
			var prueba= document.getElementById("prueba");

			var imagen=document.createElement("INPUT");
				imagen.type="file";
				imagen.className="s";
				prueba.appendChild(imagen);


			var text=document.createElement("INPUT");
			text.type="text";
			text.className="s"
			prueba.appendChild(text);

            var imagen=document.createElement("INPUT");
				imagen.type="file";
				imagen.className="s";
				prueba.appendChild(imagen);

			var tipo=document.createElement("INPUT");
			tipo.type="hidden";
			tipo.name="tipo";
			tipo.value="p1"
			prueba.appendChild(tipo);
            
		}

		function myFunction(){
			
			//Este método es para enviar los datos con indices
			//Creación de los nombres para todos los elementos hijos///
			
			var textos=document.getElementsByClassName("t");	//recogemos todos los elementos de clase "t"
			for (i = 0; i < textos.length; i++) {
				textos[i].name="tm"+i;							//Y los nombramos con ayuda del class como array
				} 	

			var imagenes=document.getElementsByClassName("i");
			for (i = 0; i < imagenes.length; i++) {
				imagenes[i].name="im"+i;
				} 	
			
			//recolectamos un string con el orden de los elementos
			var x = document.getElementsByClassName("manual");
			var ordenElementos="";
			for (i = 0; i < x.length; i++){
				ordenElementos=ordenElementos+"-"+x[i].name;
			}
			

			var orden=document.createElement("INPUT");
			orden.type="hidden";
			orden.name="ordenElementos";
			orden.value=ordenElementos;
			document.getElementById("prueba").appendChild(orden);




			//
			/*******Algoritmo de un solo tipo de envío *****************
				
            var info=document.getElementsByClassName("s");	//recogemos todos los elementos de clase "t"
			for (i = 0; i < info.length; i++) {
				info[i].name="s"+i;							//Y los nombramos con ayuda del class como array
				} 	
				*/
				document.getElementById("myForm").submit();
				
		
		}



		var idElemento=3;
		function cazador(event){
			//alert("Soy el Elemento "+event.target.id);

			var elemento=event.target.id;
			document.getElementById(elemento).style.background="cyan";
			idElemento=elemento;
		}

		function muertecaz(){
			
			document.getElementById(idElemento).remove();
		}

		function contador(){
			var x = document.getElementsByClassName("manual");
			var ordenElementos="";
			for (i = 0; i < x.length; i++){
				ordenElementos=ordenElementos+"-"+x[i].name;
			}
			
			alert(ordenElementos);
		}
</script>
</body>

</html>