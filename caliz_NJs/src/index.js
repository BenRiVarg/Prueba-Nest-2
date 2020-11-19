
//--- Motor Universal del Proyecto----//
const express= require('express');
const app= express();
const path= require('path');
//Settings
app.set('port',3000);
app.set('views',path.join(__dirname,'views'));
app.set('view engine','ejs');

//Middleware
//Routes
app.use(require('./routes/index'));
/*
app.get('/',(req,res)=>{
   //res.render('index');
    // res.sendFile(path.join(__dirname, 'views/index.html'));--VIsualizar sin motor de render
   console.log(__dirname + '/views/index.html')
   console.log(path.join(__dirname, 'views/index.html'));
    
})
*/

//Archivos Estáticos
/*Sirve para hacer de acceso universal archivos */
app.use(express.static(path.join(__dirname, 'public')));


app.listen(app.get('port'), ()=>{console.log("caliz funciona en puerto ", app.get('port'))
});//Número de Puerto