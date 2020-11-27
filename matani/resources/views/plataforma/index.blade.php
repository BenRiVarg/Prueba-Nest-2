
<!DOCTYPE html>
<html class=" ">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo-folded.png')}}">
    <title>@yield('title', 'Bienvenido a Matani')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no ,shrink-to-fit=no" />
    <meta content="Laravel boilerplate" name="description" />
    <meta content="Fraktalweb" name="author" />

    <!-- CORE CSS FRAMEWORK - START -->
    {{Html::style('assets/plugins/pace/pace-theme-flash.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/bootstrap/css/bootstrap.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/bootstrap/css/bootstrap-theme.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/fonts/font-awesome/css/font-awesome.css', array('media'=>'screen'))}}
    {{Html::style('assets/css/animate.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array('media'=>'screen'))}}
    <!-- CORE CSS FRAMEWORK - END -->

    {{Html::style('assets/plugins/jquery-ui/smoothness/jquery-ui.min.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/datepicker/css/datepicker.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/daterangepicker/css/daterangepicker-bs3.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/daterangepicker/css/daterangepicker-bs3.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datetimepicker/css/datetimepicker.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/timepicker/css/timepicker.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/css/jquery.dataTables.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/select2/select2.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css', array('media' => 'screen'))}}
    {{Html::style('assets/plugins/messenger/css/messenger.css')}}
    {{Html::style('assets/plugins/messenger/css/messenger-theme-future.css')}}
    {{Html::style('assets/plugins/messenger/css/messenger-theme-flat.css')}}
    {{Html::style('assets/plugins/icheck/skins/all.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/multi-select/css/multi-select.css', array('media' => 'screen')) }}
    {{Html::style('assets/plugins/prettyphoto/prettyPhoto.css', array('media' => 'screen')) }}
    {{Html::style('assets/plugins/tagsinput/css/bootstrap-tagsinput.css', array('media' => 'screen')) }}




      <!-- CORE CSS TEMPLATE - START -->
      {{Html::style('assets/css/style.css', array('media'=>'screen'))}}
      {{Html::style('assets/css/responsive.css', array('media'=>'screen'))}}
      {{Html::style('css/main.css', array('media'=>'screen'))}}
      <!-- CORE CSS TEMPLATE - END -->

      <!--Estilo de Matani-->
      {{Html::style('assets/css/matani/cliente/inicio.css', array('media'=>'screen'))}}
      <!---->
    @yield('head')

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body ><!-- START TOPBAR -->
    
        <div class="col-lg-12">
        
        <section class="box ">
            <div class="container-fluid frakHeader">
                <div class="row" >
                    <div class="pull-right">
                     
                       <h1 class="tipoFraktal" > <img src="/img/fraktal.png " class="float-left"  style="float:left;"alt="fraktal fallido">FraktalWeb</h1>
                        
                     
                    </div>    
                </div>
              
            </div>
        
            <div clas="container-fluid">
            <div class="row espMat">
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <img src="/img/logo matani.png" alt="matani fallido" >
                                            
                                                <h1 class="tipoMatani" >Matani</h1>
                                                <h2 class="tipoFraktal" >Manuales en Movimiento</h2>
                                        </div>
            </div>
            <div class="container">              
                          <div class="row">
                    <p class="bienvenida text-center" >¡Bienvenido!</p>
                    <p class="bienvenida text-center" >A continuación te listamos los manuales que tenemos disponibles para ti .</p>
                    <p class="bienvenida text-center" >Para obtener apoyo a las funcionalidades básicas y especializadas de tú manual haz click en él.</p>
            </div>

                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="row">
                                            <div class="col-lg-12 col-lg-offset-1 col-sm-12 col-sm-offset-3">
                                               
                                                   
                                            @foreach($manuales as $manual)
                                                    <div class="col-lg-3 col-sm-6 col-md-4 music_genre manual" >
                                                    <div class="team-member ">
                                                        <div class="team-img ">
                                                            <img  src="{{url('storage/definitivo/'.$imagenes[$loop->index])}}" class="imgManual"  alt="Fallo carga ejemplo"  />   
                                                        </div>                         <div class="team-info ">
                                                            <h4 class="text-center" >
                                                                <a href="{{route('cliente.faqs',$manual->id)}}" class="tituloM text-capitalize" >
                                                                {{$manual->nombre}}</a>
                                                            </h4>

                
                                                            <span><p class="descripcion">{{$manual->descripcion}}</p></span>
                                                            <br>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                <div class="col-lg-3 col-sm-6 col-md-4 music_genre  manual">
                                                    <div class="team-member ">
                                                        <div class="team-img ">
                                                            <img img-responsive src="img/logofraktal.jpg" alt="Fallo carga ejemplo"  />   
                                                        </div>                         <div class="team-info ">
                                                            <h4 class="text-center">


                                                                <a href="uni-course-profile.html" class="tituloM" >
                                                                    Manual Prototipo</a>


                                                            </h4>

                
                                                            <span><p class="descripcion">Manual de prueba #1 para dar ejemplificación de toda la plataforma</p></span>
                                                            <br>
                                                            </div>

                                                        <p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6 col-md-4 music_genre  manual">
                                                    <div class="team-member ">
                                                        <div class="team-img ">
                                                            <img img-responsive src="img/logofraktal.jpg" alt="Fallo carga ejemplo"  />   
                                                        </div>                         <div class="team-info ">
                                                            <h4 class="text-center">


                                                                <a href="uni-course-profile.html" class="tituloM" >
                                                                    Manual Prototipo</a>


                                                            </h4>

                
                                                            <span><p class="descripcion">Manual de prueba #1 para dar ejemplificación de toda la plataforma</p></span>
                                                            <br>
                                                            </div>

                                                        <p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-md-4 music_genre  manual">
                                                    <div class="team-member ">
                                                        <div class="team-img ">
                                                            <img img-responsive src="img/logofraktal.jpg" alt="Fallo carga ejemplo"  />   
                                                        </div>                         <div class="team-info ">
                                                            <h4 class="text-center">


                                                                <a href="uni-course-profile.html" class="tituloM" >
                                                                    Manual Prototipo</a>


                                                            </h4>

                
                                                            <span><p class="descripcion">Manual de prueba #1 para dar ejemplificación de toda la plataforma</p></span>
                                                            <br>
                                                            </div>

                                                        <p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-md-4 music_genre  manual">
                                                    <div class="team-member ">
                                                        <div class="team-img ">
                                                            <img img-responsive src="img/logofraktal.jpg" alt="Fallo carga ejemplo"  />   
                                                        </div>                         <div class="team-info ">
                                                            <h4 class="text-center">


                                                                <a href="uni-course-profile.html" class="tituloM" >
                                                                    Manual Prototipo</a>


                                                            </h4>

                
                                                            <span><p class="descripcion">Manual de prueba #1 para dar ejemplificación de toda la plataforma</p></span>
                                                            <br>
                                                            </div>

                                                        <p>
                                                    </div>
                                                </div>

                                        </div>
                                    
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>

<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

@section('footer')

  <!-- CORE JS FRAMEWORK - START -->
  {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
  <!-- {{-- HTML::script('assets/js/jquery-1.11.2.min.js') --}} -->
  {{ HTML::script('assets/js/jquery.easing.min.js')}}
  {{ HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
  {{ HTML::script('assets/plugins/pace/pace.min.js')}}
  {{ HTML::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}
  {{ HTML::script('assets/plugins/viewport/viewportchecker.js') }}
  {{ HTML::script('js/sliiide.js') }}
  <!-- CORE JS FRAMEWORK - END -->



  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  {{ HTML::script('assets/plugins/datepicker/js/datepicker.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/daterangepicker/js/moment.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/daterangepicker/js/daterangepicker.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/timepicker/js/timepicker.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datetimepicker/js/datetimepicker.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/jquery-validation/js/additional-methods.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/js/form-validation.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/js/jquery.dataTables.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js', ["type" => "text/javascript"])}}
  {{ Html::script('assets/plugins/jquery-ui/smoothness/jquery-ui.min.js', ["type" => "text/javascript"]) }}
  {{ Html::script('assets/plugins/icheck/icheck.min.js', ["type" => "text/javascript"]) }}
  {{ Html::script('assets/plugins/select2/select2.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/multi-select/js/jquery.multi-select.js', ["type" => "text/javascript"])}}
  {{ HTML::script('assets/plugins/multi-select/js/jquery.quicksearch.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/prettyphoto/jquery.prettyPhoto.js', ["type" => "text/javascript"]) }}

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
  

  <!-- CORE TEMPLATE JS - START -->
  {{ HTML::script('assets/js/scripts.js') }}
  <!-- END CORE TEMPLATE JS - END -->

  </body>
  </html>