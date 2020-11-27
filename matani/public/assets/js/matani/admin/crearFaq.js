
var insercion= document.getElementById("insercion");

function crearFaq(){

    /*
    <!---->
    <section class="box ">
        <header class="panel_header">
           
                <div class="actions panel_actions pull-right">
                <i class="box_close fa fa-times"></i>
            </div>
        </header>
        <!--Insertar el estilizado-->
    <h1>Elemento eliminable</h1>
    </section>
    <!---->
    */
   //creaccion de elemento para destruir la nueva Faq
   /*
   var seccion=document.createElement("SECTION");
   seccion.className="box";

   var encabezado=document.createElement("HEADER");
   encabezado.className="panel_header";

   
   var panel=document.createElement("DIV");
   panel.className="actions panel_actions pull-right";

   var acciones=document.createElement("I");
   acciones.className="box_close fa fa-times";

   encabezado.appendChild(panel);
   panel.appendChild(acciones);
   seccion.appendChild(encabezado);
    */   
   var tache=document.createElement("I");
   tache.className="fa fa-close tache";


   ////////////////////
    var estiloFormulario=document.createElement("DIV");
    estiloFormulario.className="nuevaFaq";

    var row=document.createElement("DIV");
    row.className="row";

    var contenedor=document.createElement("DIV");
    contenedor.className="col-md-8 col-sm-9 col-xs-10";
    
    var editorTF=formTituloF();
    var editorCF=formContenidoF();

    contenedor.appendChild(editorTF)//contenedor /Titulo Faq
    contenedor.appendChild(editorCF)//contenedor /Contenido Faq
    row.appendChild(tache);
    row.appendChild(contenedor);//row

    estiloFormulario.appendChild(row);
  //  seccion.appendChild(estiloFormulario);
    insercion.appendChild(estiloFormulario);

    

    
       

       
       
        
  

    
    
}

function formTituloF(){
    //Metodo para crear formularios para Nombrar las Faqs
    
    var tituloF=document.createElement("DIV");
    tituloF.className="form-group";
    

    //Editor del Titulo Faq (input)
    var elementoFormulario=document.createElement("DIV");
    elementoFormulario.className="controls";

    var elementoEditor=document.createElement("INPUT");
    elementoEditor.type="text"
    elementoEditor.className="form-control agregadoTF"
    elementoEditor.id="field-1"
    

    elementoFormulario.appendChild(elementoEditor);


     //Editor del Titulo Faq (estilos)
    var labTF=document.createElement("LABEL") //label
    var contenidolabTF=document.createTextNode("Titulo Faq");
    labTF.setAttribute("for","field-1");
    labTF.appendChild(contenidolabTF);

    var spanTF=document.createElement("SPAN");  //span
    spanTF.className="desc";
    textoSpanTf=document.createTextNode("Pregunta que le aparecerá al usuario.");
    spanTF.appendChild(textoSpanTf);

    //Ingreso al div contenedor

    tituloF.appendChild(labTF);
    tituloF.appendChild(spanTF);
    tituloF.appendChild(elementoFormulario);
    
    

    return tituloF;
    

}
function formContenidoF(){
    /*
   

<div class="form-group">
    <label class="form-label" for="field-6">Contenido de la Faq</label>

    <div class="controls">
        <textarea class="form-control" cols="5" id="field-6" placeholder="Contenido de Respuesta a la Faq" name="cont"></textarea>
    </div>
</div>
*/
//Método para crear contenidos de Faqs
    var contenidoF=document.createElement("DIV");
    contenidoF.className="form-group";

    //Editor del Contenido Faq (input)
    var elementoFormulario=document.createElement("DIV");
    elementoFormulario.className="controls";

    var elementoEditor=document.createElement("TEXTAREA");
    elementoEditor.className="form-control agregadoCF"
    elementoEditor.cols="5";
    elementoEditor.id="field-6";
    elementoEditor.placeholder="Contenido de Respuesta a la Faq";
   

    elementoFormulario.appendChild(elementoEditor);

    //Editor del Contenido Faq (estilo)
    var labCF=document.createElement("LABEL") //label
    var contenidolabCF=document.createTextNode("Contenido de la Faq");
    labCF.setAttribute("for","field-6");
    labCF.appendChild(contenidolabCF);

    //Ingreso al div contenedor

    contenidoF.appendChild(labCF);
    contenidoF.appendChild(elementoFormulario);

    return contenidoF;

}

$(document).on('click', "i.tache", function (e) {
    /*
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    */
    $(this).parent().parent().remove();
    e.stopPropagation();
});

function envioClasificador(){
    //MODIFICADORES
     //elementoEditor.name="agregadoCF"
     //elementoEditor.name="agregadoTF"
     var contadorTF=document.getElementsByClassName("agregadoTF");	//recogemos todos los elementos de clase 
			for (i = 0; i < contadorTF.length; i++) {
				contadorTF[i].name="tf"+i;							//Y los nombramos con ayuda del class como array
				} 
     var contadorCF=document.getElementsByClassName("agregadoCF");	
			for (i = 0; i < contadorCF.length; i++) {
				contadorCF[i].name="cf"+i;						
                } 	
                
    document.getElementById("faqsForm").submit();
}

function eliminador(){
    //funcion para crear el eliminador de los elementos
    //crea una x para eliminar elementos, pero aún no esta funcionando

    var seccion=document.createElement("SECTION");
   seccion.className="box";


   var encabezado=document.createElement("HEADER");
   encabezado.className="panel_header";

   var panel=document.createElement("DIV");
   panel.className="actions panel_actions pull-right";

   var acciones=document.createElement("I");
   acciones.className="box_close fa fa-times";

   panel.appendChild(acciones);
   encabezado.appendChild(panel);
     seccion.appendChild(encabezado);

     return seccion;

}


