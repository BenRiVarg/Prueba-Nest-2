<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Matani') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
      <!--Estilos de Matani-->
      {{Html::style('assets/css/matani/cliente/inicio.css', array('media'=>'screen'))}}
      <!--fin matani-->

    @yield('head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Matani') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
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
