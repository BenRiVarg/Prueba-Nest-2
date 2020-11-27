

var insertor =document.getElementById('insercion');//Variable para reconocer en que lugar de la página se inserta el contenido
var nsubS=1;//Variable para dar id a cada SubSección que se crea
var nElem=0;//Variable para crear los ids de todo el DOM
var editable;//Variable para añadir o destruir elementos

   
    

 /*var superTextArea=  document.getElementsByClassName("bootstrap-wysihtml5-textarea");  */
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
    contenedor.className="form-group";
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
    
}

function txtComplejo(){
   /*
                        <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" id="editor">Hackiando el editor</textarea>
                                    </div>
                                </div>
                                */
        molde=document.getElementById("sei");
        //var molde=document.getElementsByClassName("bootstrap-wysihtml5-textarea");
        //var superEditor=molde.cloneNode(true);
       // superEditor.id="noc"
     //  insertor.appendChild(molde);
       var subSeccion=document.getElementById(editable);
           subSeccion.appendChild(molde);

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
    contenedor.appendChild(lab);
    contenedor.appendChild(elementoFormulario);

    insertor.appendChild(contenedor);
    
			
}


 function subSeccion(){
     /*
     <div class="subS" id="sub0">
       <div class="form-group">
                                            <label class="form-label text-primary" for="field-1">Titulo de la SubSección</label>
                            
                                            <div class="controls">
                                                <input type="text" class="form-control " id="field-1" name="nomSubS" required>
                                            </div>
                                        </div>
     </div>
     */ 

    var contenedor=document.createElement("DIV");
    contenedor.className="subS";
    contenedor.id="sub"+nsubS;

    var titulosubS=document.createElement("DIV");
    titulosubS.className="form-group";
    
    var labTF=document.createElement("LABEL") //label
    labTF.className="form-label text-primary tituloSub";
    var contenidolabTF=document.createTextNode("Ingresa el Título de la Subsección");
    labTF.setAttribute("for","field-1");
    labTF.appendChild(contenidolabTF);

    //Editor del Titulo Faq (input)
    var elementoFormulario=document.createElement("DIV");
    elementoFormulario.className="controls";

    var elementoEditor=document.createElement("INPUT");
    elementoEditor.type="text"
    elementoEditor.className="form-control nombreSub manual";
    elementoEditor.id="field-1"

    elementoFormulario.appendChild(elementoEditor);

    titulosubS.appendChild(labTF);
    titulosubS.appendChild(elementoFormulario);

   
    contenedor.appendChild(titulosubS);
    insertor.appendChild(contenedor);
    nsubS=nsubS+1;
 }

 function textAreaD(){
    /*                              
                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Contenido</label>
                                         
                                                <div class="controls">
                                                    <textarea class="form-control agregadoCF" cols="5" id="field-6" placeholder="Texto en bruto para el Manual" name="texta" ></textarea>
                                                </div>
                                            </div>
    */
        var contenedor=document.createElement("DIV");
        contenedor.className="form-group";
        //Falta crear un Label posiblemente
        var elementoFormulario=document.createElement("DIV");
        elementoFormulario.className="controls";
        
        var areaTexto=document.createElement("TEXTAREA");
        areaTexto.className="form-control ta manual";
        areaTexto.cols="5";
        //areaTexto.id="field-6";
        areaTexto.id="elem"+nElem;
        areaTexto.placeholder="Texto en bruto para el Manual";
    
        elementoFormulario.appendChild(areaTexto);
        contenedor.appendChild(elementoFormulario);

        //
         var subSeccion=document.getElementById(editable);
         subSeccion.appendChild(contenedor);
        
         nElem=nElem+1;
    }

    function crearImgD(){
        /*
        <div class="form-group">
        <i class="pull-right left-exit fa fa-close icon-danger icon-lg"></i>
           <label class="form-label" for="field-1">Elige la imagen del Manual:</label>
           <div class="controls">
               <input type="file" id="field-1" name="img"> 
           </div>
       </div>
       */  
       
           var contenedor=document.createElement("DIV");
           contenedor.className="form-group archivo";
           
          
       
           var elementoFormulario=document.createElement("DIV");
           elementoFormulario.className="controls";
       
         
           //Creación del archivo file

           var id_dinamico="elem"+nElem;
           var imagen=document.createElement("INPUT");
           imagen.type="file";
           imagen.id=id_dinamico;
           imagen.className="i manual";

           var tache=document.createElement("I");
           tache.className="fa fa-close tache";

            //Creación del Label
            var lab=document.createElement("LABEL") //label
            var contenidolab=document.createTextNode("Selecciona imagen para insertar en el Manual");
            lab.setAttribute("for",id_dinamico);
            lab.appendChild(contenidolab);

       
           elementoFormulario.appendChild(imagen);
           contenedor.appendChild(tache);
           contenedor.appendChild(lab);
           contenedor.appendChild(elementoFormulario);
           
           var subSeccion=document.getElementById(editable);
           subSeccion.appendChild(contenedor);
           
                   
       }

    function final(){
        //Eliminación de los "finales" anteriores para un correcto procesamiento
        $("input.fin").remove();
        
        var SubSecciones=document.getElementsByClassName("subS");

        
        
        for(i=0;i<SubSecciones.length;i++){
            
            var final=document.createElement("INPUT");
            final.type="hidden";
            final.className="manual fin";
            final.name="finm"+i;
        
            SubSecciones[i].appendChild(final);
        }
        
    }
   
    

//Eventos de JQuery
    //Editor de Subsecciones
 $(document).on('click', "div.subS", function () {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    editable=$(this).attr("id");
 
});
    //Editor de Text Area
 $(document).on('click', "div.subS textarea.ta", function (e) {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    editable=$(this).attr("id");
    e.stopPropagation();
  });

   $(document).on('click', "div.subS textarea.ta", function (e) {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    editable=$(this).attr("id");
    e.stopPropagation();
  });

$(document).on('click', "i.tache", function (e) {
    var id_anterior="#"+editable;
    $(id_anterior).css("background-color","white");
    $(this).css("background-color","#f4fffd");
    $(this).parent().remove();
    e.stopPropagation();
});

  

function destruir(){
   
    elemento=document.getElementById(editable);
    elemento.remove();
    
}

    function envioEspecializado(){

      
        //Este método es para enviar los datos con indices
        //Creación de los nombres para todos los elementos hijos///
        //La m en cada clase es importante por que en base a ella se hace una partición del elemento para su procesamiento 

                //Se marca el final de cada sección para fines de procesamiento
                final()
                var subSecciones=document.getElementsByClassName("nombreSub");
                //Variable para saber cuantas subsecciones se envian
                
                for (i = 0; i < subSecciones.length; i++) {
                    subSecciones[i].name="Subm"+i;							//Y los nombramos con ayuda del class como array
                    } 
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
                    ordenElementos=ordenElementos+"-"+x[i].name;
                }
                
                //y ponemos dicho string dentro del formulario para ser procesado
                var orden=document.createElement("INPUT");
                orden.type="hidden";
                orden.name="ordenElementos";
                orden.value=ordenElementos;
                document.getElementById("manualForm").appendChild(orden);

           
                
                var contenido=$('#editor').val();


                var superEditor=document.createElement("INPUT");
                superEditor.type="hidden";
                superEditor.name="superEditor";
                superEditor.value=contenido;
                document.getElementById("manualForm").appendChild(superEditor);

                //Envio del formulario a store
                document.getElementById("manualForm").submit();
                
            }
