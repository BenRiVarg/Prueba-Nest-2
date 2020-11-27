

var insertor=document.getElementById('insercion');
var idElemento="";  //Variable para almacenar los elementos y poder eliminarlos
var editable;//Variable para añadir o destruir elementos
var nElem=0;//Variable para crear los ids de todo el DOM
function textArea(){
    /*                              
                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Contenido</label>
                                         
                                                <div class="controls">
                                                    <textarea class="form-control agregadoCF" cols="5" id="field-6" placeholder="Texto en bruto para el Manual" name="texta" ></textarea>
                                                </div>
                                            </div>
    */
        var contenedor=document.createElement("DIV");
        contenedor.className="form-group editorT";
        contenedor.id="elem"+nElem;
        //Falta crear un Label posiblemente
        var elementoFormulario=document.createElement("DIV");
        elementoFormulario.className="controls";
        
        var areaTexto=document.createElement("TEXTAREA");
        areaTexto.className="form-control ta manual";
        areaTexto.cols="5";
        areaTexto.id="field-6";
        areaTexto.placeholder="Texto en bruto para el Manual";
    
        elementoFormulario.appendChild(areaTexto);
        contenedor.appendChild(elementoFormulario);
    
        insertor.appendChild(contenedor);
        nElem=nElem+1;
    }

function crearImg(){
    /*
    <div class="form-group">
        <label class="form-label" for="field-1">Elige la imagen del Manual:</label>
        <div class="controls">
            <input type="file" id="field-1" name="img"> 
        </div>
    </div>
    */  
    
        var contenedor=document.createElement("DIV");
        contenedor.className="form-group";

        var tache=document.createElement("I");
        tache.className="fa fa-close tache";
        
        //Creación del Label
            var lab=document.createElement("LABEL") //label
            var contenidolab=document.createTextNode("Selecciona imagen para insertar en el Manual");
            lab.setAttribute("for","field-1");
            lab.appendChild(contenidolab);
    
        var elementoFormulario=document.createElement("DIV");
        elementoFormulario.className="controls";
    
        
        //Creación del archivo file
        var imagen=document.createElement("INPUT");
        imagen.type="file";
        imagen.id="field-1";
        imagen.className="i manual";

        elementoFormulario.appendChild(imagen);
        contenedor.appendChild(tache);
        contenedor.appendChild(lab);
        contenedor.appendChild(elementoFormulario);
    
        insertor.appendChild(contenedor);
        
                
    }

function editarImg(){

//Obtención del id para encontrar el elemento a reemplazar el elemento Img
var elementoStr=event.target.id;
var indiceElemento=parseInt(elementoStr.slice(2,3))-1; 
  
var editorImagenes=document.getElementsByClassName("ImgEditor");

var nuevaContenido=nuevaImg();
editorImagenes[indiceElemento].innerHTML=nuevaContenido;
}



function nuevaImg(){
    /*
    <div class="form-group">
       <label class="form-label" for="field-1">Elige la imagen del Manual:</label>
       <div class="controls">
           <input type="file" id="field-1" name="img"> 
       </div>
   </div>
   */  
   
       var contenedor=document.createElement("DIV");
       contenedor.className="form-group";
       
       //Creación del Label
         var lab=document.createElement("LABEL") //label
         var contenidolab=document.createTextNode("Selecciona la nueva imagen para insertar en el Manual");
         lab.setAttribute("for","field-1");
         lab.appendChild(contenidolab);
   
       var elementoFormulario=document.createElement("DIV");
       elementoFormulario.className="controls";
   
     
       //Creación del archivo file
       var imagen=document.createElement("INPUT");
       imagen.type="file";
       imagen.id="field-1";
       imagen.className="i manual";
   
       elementoFormulario.appendChild(imagen);
       contenedor.appendChild(lab);
       contenedor.appendChild(elementoFormulario);
   
       return contenedor.innerHTML;
       
               
   }

   function ponerId(){
    var editortexto=document.getElementsByClassName("editorT");
    var clave="ET"
    for(i=0;i<editortexto.length;i++){
        
        var elemento=editortexto[i];
        elemento.id=clave+i;
    }
   }


   $(document).on('click', "div.editorT", function () {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","lightblue");
    editable=$(this).attr("id");

});


$(document).on('click', "i.tache", function (e) {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    $(this).parent().remove();
    e.stopPropagation();
});

$(document).on('click', "h4.EI", function () {
    $(this).parent().remove();
});

function destruir(){
   
    elemento=document.getElementById(editable);
    elemento.remove();
    
}

   function envioEspecializado(){

      
    //Este método es para enviar los datos con indices
    //Creación de los nombres para todos los elementos hijos///
    //La m en cada clase es importante por que en base a ella se hace una partición del elemento para su procesamiento        
     
    //Nombramiento de cada Elemento
  
            var textos=document.getElementsByClassName("ta");	//recogemos todos los elementos de clase "ta"
            for (i = 0; i < textos.length; i++) {
                textos[i].name="tm"+i;							//Y los nombramos con ayuda del class como array
                } 	
               
            var imagenes=document.getElementsByClassName("i");
            for (i = 0; i < imagenes.length; i++) {
                imagenes[i].name="im"+i;
                } 

            var superEditor=document.getElementsByClassName("superEditor");
            for (i = 0; i < superEditor.length; i++) {
                superEditor[i].name="sem"+i;
                } 	
                
             //recolectamos un string con el orden de los elementos
             
             var x = document.getElementsByClassName("manual");
             var ordenElementos="";
             for (i = 0; i < x.length; i++){
                 if(x[i].tagName=="DIV"){
                     //Para seguir salvando aquellas imágenes que no fueron modificadas
                     var contenido=x[i].children[1].name;
                     //Solo si no está vacio()
                     if (typeof contenido !== "undefined"){
                    ordenElementos=ordenElementos+"-"+contenido;
                     }
                 }
                 else{
                    ordenElementos=ordenElementos+"-"+x[i].name;
                 }
             }
             
            

    //Termina el nombramiento
  
            //y ponemos dicho string dentro del formulario para ser procesado
            var orden=document.createElement("INPUT");
            orden.type="hidden";
            orden.name="ordenElementos";
            orden.value=ordenElementos;
            document.getElementById("editor").appendChild(orden);
              
           var contenido=$('#edit').val();

            var superEditor=document.createElement("INPUT");
            superEditor.type="hidden";
            superEditor.name="superEditor";
            superEditor.value=contenido;
            document.getElementById("editor").appendChild(superEditor);


            //Envio del formulario a store
          
            document.getElementById("editor").submit();
            
        }

   