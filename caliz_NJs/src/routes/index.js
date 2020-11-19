const express= require('express');
const router=express.Router();

router.get('/',(req,res)=>{
    res.render('index');
     // res.sendFile(path.join(__dirname, 'views/index.html'));--VIsualizar sin motor de render
    /*console.log(__dirname + '/views/index.html')
    console.log(path.join(__dirname, 'views/index.html'));
     */
 })

 router.get('/otra',(req,res)=>{
    res.render('otra',{dinamico:'Valor Cargado dinámicamente'});
     // res.sendFile(path.join(__dirname, 'views/index.html'));--VIsualizar sin motor de render
    /*console.log(__dirname + '/views/index.html')
    console.log(path.join(__dirname, 'views/index.html'));
     */
 })
 module.exports=router;