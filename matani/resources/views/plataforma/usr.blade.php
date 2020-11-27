<!DOCTYPE html>
<html>
    <head>


            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
            <meta charset="utf-8" />
            <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo-folded.png')}}">
            <title>@yield('title', 'Plataforma : Administración')</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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

            <!-- ESTILO DE MATANI-->
            {{ HTML::style('assets/css/matani/estiloma.css') }}
            <!---->
            @yield('head')

        <meta charset="utf-8">
        <title>Manual para el cliente </title>
    </head>
    <div class="conatiner-fluid encabezado bg-info">
    <!--
        <div class="row">
            <img src="/img/logo matani.png" alt="matani fallido"  id="lmatani">
            <div id=lfraktal>
            <h1 class="tipoFraktal" > <img src="/img/fraktal.png "   style="float:left;"alt="fraktal fallido">FraktalWeb</h1>
            </div>
        -->
     

        <div class="row">
            <div class="logos">
                <img src="/img/logo matani.png" alt="matani fallido"  id="lmatani">
                <div class=lfraktal>
                <h1 class="tipoFraktal" > <img src="/img/fraktal.png "   style="float:left;"alt="fraktal fallido">FraktalWeb</h1>
                
                <!--
                <img src="/img/fraktal.png "   style="float:left;"alt="fraktal fallido">
                <h1 class="tipoFraktal" >FraktalWeb</h1>
                -->
                </div>
            </div>
        </div>
        @yield('tituloManual')
    </div>
    
   
    <body>
        
        
       
        <nav>
            @yield('barra')
         
        </nav>
        @yield('content')

        <!-- END CONTAINER -->
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




@show

@section('moreJs')

@show

<script type="text/javascript">

var menu = $('.left-menu').sliiide({place: 'left', exit_selector: '.left-exit', toggle: '#nav-icon2', no_scroll: false});
$(() => {
  // $('#nav-icon2').on('click', () => {
  //   document.body.scrollTop = 0;
  //   document.documentElement.scrollTop = 0;
  // })
});
</script>


    </body>
</html>