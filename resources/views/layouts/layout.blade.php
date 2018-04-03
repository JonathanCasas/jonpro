<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="/favicon.ico" rel="{{asset('jonpro/jonpro-icon.png')}}" />
        <title>{{Jonpro::getSiteName()}}</title>

        <!-- Styles -->
        <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
        <!-- Bootstrap -->
        <link href="{{asset('gentella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('gentella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('gentella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{asset('gentella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{asset('gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{asset('gentella/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="{{asset('gentella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('gentella/build/css/custom.min.css')}}" rel="stylesheet">
        <link href="{{asset('gentella/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
        <!-- Switchery -->
        <link href="{{asset('gentellavendors/switchery/dist/switchery.min.css" rel="stylesheet')}}">
        <!-- starrr -->
        <link href="{{asset('gentella/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="{{asset('gentella/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
        <!-- PNotify -->
        <link href="{{asset('gentella/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
        <link href="{{asset('gentella/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
        <link href="{{asset('gentella/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
        <link href="{{asset('css/jonpro.css')}}" rel="stylesheet">


        @yield('css_main')
    </head>
    <body class="nav-md">

        <div id="app">
            @yield('main')
        </div>

        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}"></script>-->

        <!-- jQuery -->
        <script src="{{asset('gentella/vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('gentella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Fa                stClick -->
        <script src="{{asset('gentella/vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{asset('gentella/vendors/nprogress/nprogress.js') }}"></script>
        <!-- Chart.js -->
        <script src="{{asset('gentella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
        <!-- gauge.js -->
        <script src="{{asset('gentella/vendors/gauge.js/dist/gauge.min.js') }}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('gentella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{asset('gentella/vendors/iCheck/icheck.min.js') }}"></script>
        <!-- Skycons -->
        <script src="{{asset('gentella/vendors/skycons/skycons.js') }}"></script>
        <!-- Flot -->
        <script src="{{asset('gentella/vendors/Flot/jquery.flot.js') }}"></script>
        <script src="{{asset('gentella/vendors/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{asset('gentella/vendors/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{asset('gentella/vendors/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{asset('gentella/vendors/Flot/jquery.flot.resize.js') }}"></script>
        <!-- Flot plugins -->
        <script src="{{asset('gentella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{asset('gentella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{asset('gentella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
        <!-- DateJS -->
        <script src="{{asset('gentella/vendors/DateJS/build/date.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{asset('gentella/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
        <script src="{{asset('gentella/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{asset('gentella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('gentella/vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{asset('gentella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

        <!-- Custom Theme Scripts -->
        <script src="{{asset('gentella/build/js/custom.js') }}"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="{{asset('gentella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
        <script src="{{asset('gentella/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
        <script src="{{asset('gentella/vendors/google-code-prettify/src/prettify.js') }}"></script>
        <!-- jQuery Tags Input -->
        <script src="{{asset('gentella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
        <!-- Switchery -->
        <script src="{{asset('gentella/vendors/switchery/dist/switchery.min.js') }}"></script>
        <!-- Parsley -->
        <script src="{{asset('gentella/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
        <!-- Autosize -->
        <script src="{{asset('gentella/vendors/autosize/dist/autosize.min.js') }}"></script>
        <!-- jQuery a                utocomplete -->
        <script src="{{asset('gentella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
        <!-- starrr -->
        <script src="{{asset('gentella/vendors/starrr/dist/starrr.js') }}"></script>
        <script src="{{asset('gentella/vendors/pnotify/dist/pnotify.js')}}"></script>
        <script src="{{asset('gentella/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
        <script src="{{asset('gentella/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
        @yield('js_main')
    </body>
</html>
