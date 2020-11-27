<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//------PÁGINA DE INICIO----------
Route::get('/', 'ControladorPlataforma@indxcliente')->name('index');
 
//--------------------//

//-----------AUTH------------//


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('rol');
Route::get('/editorP','HomeController@veditors');
Route::get('/foraneo', 'HomeController@foraneo');

//--------------------//



//-----------P R O Y E C T O ------------/////////

//---------------------||Layouts||
Route::get('/ultra', 'ControladorPlataforma@Aultra')->name('Ultra')->middleware('auth'); //base de Admin
Route::get('/usr', 'ControladorPlataforma@Usr')->name('usr');        //base vista de los Manuales
Route::get('/dashboard', 'ControladorPlataforma@dashboard')->name('Dash'); 

//---------------------||Usuarios(Clientes)||

Route::name('cliente.')->group(function () {
    Route::get('/faqs/{id}', 'ControladorPlataforma@faqs')->name('faqs');
});

Route::post('/manual/{id}', 'ControladorPlataforma@manual')->name('manual')->middleware('manual');
//Ruta con seguridad para el Manual
//Route::post('/manual', 'ControladorPlataforma@manual')->name('manual')->middleware('manual');



//---------------------||Registro de usuarios||

Route::name('usuarios.')->group(function () {
  
    Route::get('/usuarios', 'ControladorPlataforma@usuarios')->name('vista');

    Route::get('register', 'ControladorPlataforma@salvarUsr')->name('registro');

    Route::post('register', 'Auth\RegisterController@register')->name('salvar');




});



//---------------------||Administradores||

//Route::middleware(['web', 'subscribed'])->name...
Route::name('admin.')->group(function () {
  
    //Desplagados de información correspondientes en Admin
    Route::get('/listadofaq/{idManual}', 'ControladorPlataforma@listadoFaq')->name('ListadoF');
    
    Route::get('/listadomanual', 'ControladorPlataforma@listadoManual')->name('ListadoM');
    
    //+++++++++++++++++EDITORES+++++++++++++++++//
    Route::get('/editorF', 'ControladorPlataforma@editorFaqs')->name('editorF');

    Route::post('/editorM', 'ControladorPlataforma@editorManual')->name('editorM');
    //++++++++++++++++++++++++++++++++++++++++++//
    Route::get('/manual/{id}', 'ControladorPlataforma@manualA')->name('manual');
});


	
 




//---------------------||Contacto||
Route::get('/contacto', 'ControladorPlataforma@contacto')->name('contacto');

//-------------------------------------------/////



//******************CRUD*************************//
Route::resource('integrantes', 'IntegrantesController');
Route::resource('Servicios', 'ControladorServicios');
Route::resource('User', 'UserController');



///---------CRUD de FAQS---------//
Route::get('indCFaqs/{idM}','ControladorFaqs@index')->name('indexCF');
Route::get('creCFaqs/{idM}','ControladorFaqs@create')->name('createCF');
Route::resource('crudF','ControladorFaqs',['except' => ['index','create','show']]);

///------------CRUD de Manuales-------//
Route::get('/indCManual/{idM}','ControladorManuales@index')->name('indexCM');
//Route::get('/showM/{id}/nS/{nomSecc}/nSubS/{nomSubS}/c/{cont}/cmp/{compilado}','ControladorManuales@show')->name('muestraM');
Route::post('/showM','ControladorManuales@show')->name('muestraM');
Route::get('/nuevaSM/{id}','ControladorManuales@nuevaSeccionManual')->name('nuevaSeccionM');
Route::resource('crudM','ControladorManuales',['except' => ['index','show']]);

///*************************************************///
//---------PRUEBAS---------//

//login//
Route::get('/ulogin', 'ControladorManuales@ulogin')->name('ulogin');



// En este es el que se guarda
Route::post('media', function () {
   
    request()->validate(['file' => 'image']);
   
    return request()->file('file')->storeAs('definitivo', request()->file->getClientOriginalName(),'public');
    
});

//Formulario dinámico
Route::post('penvio','ControladorManuales@penvio');

Route::get('/cliente', 'ControladorManuales@cliente')->name('cliente');

Route::get('/guardado/{compilado}', 'ControladorManuales@superGuardado')->name('guarda');

//************************Editor dinámico**************************
/*Route::get('/', function () {
    return  view('pruebas.inicio2');
});*/

Route::get('editor', 'ControladorManuales@editorDinamico')->name('editorD');


//Prueba de sacar indices de un array php
Route::get('/adinamico', 'ControladorManuales@pdinamismo');


//Manipulando el ultra admin

Route::get('/ultrap', 'ControladorManuales@ultrap');
//--------------------//



//Prueba de compartimiento
Route::name('comparte.')->group(function () {
  
    //Desplagados de información correspondientes en Admin
    Route::get('/c1', 'ControladorManuales@comparte1')->name('c1');
    
    Route::get('/c2', 'ControladorManuales@comparte2')->name('c2');

});
Route::get('/formulario','HomeController@foraneo');
Route::post('/rformulario','HomeController@pruebaEnvio')->name('envioP');
//INFORMACIÓN IMPORTANTE :
/*
RECUPERACIÓN DE INFORMACIÓN ARCHIVOS :https://styde.net/almacenamiento-streaming-y-descarga-de-archivos-en-laravel-5-5/

APLICACIÓN DE MIDDLEWARE A UN GRUPO DE RUTAS:
https://styde.net/grupos-de-rutas-en-laravel-5/

como hacer un crud en laravel :
https://www.ecodeup.com/como-crear-un-crud-en-laravel-5-5-desde-cero/

//El tocify de UltraAdmin está chido para la vista del cliente

// Diseño web chido
//https://www.uplabs.com/

ATENCIÓN Las rutas que dejan de mostrar el css dejan de hacerlo por el envio de datos por ruta /[$dato]
*/





