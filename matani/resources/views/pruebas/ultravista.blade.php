
<!DOCTYPE html>
<html class=" ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
</head>
<body>
    

<h4>Default Style</h4>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Ultra Admin and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ultra Admin</a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-3">
            <button type="button" class="btn btn-default navbar-btn">Sign in</button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left hidden-md hidden-sm" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-left hidden-xs hidden-lg">
                <li><a href="#"><i class='fa fa-search'></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class='fa fa-envelope'></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>







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