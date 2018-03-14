<!DOCTYPE html>
<html>
    <head>
        <title>Materialize CSS Jon</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="{{asset('/materialize/css/materialize.css')}}">

    </head>
    <body>
        <style>
            .header-text{
                padding-left: 40px !important;
            }
        </style>
        <!-- Page Layout here -->
        <div class="row">
            <nav>
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo header-text">Logo</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
                        <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
                        <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
                        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </nav>
            <ul id="slide-out" class="side-nav fixed" style="margin-top: 65px;">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="{{asset('/materialize/images/office.jpg')}}">
                        </div>
                        <a href="#!user"><img class="circle" src="{{asset('/materialize/images/yuna.jpg')}}"></a>
                        <a href="#!name"><span class="white-text name">John Doe</span></a>
                        <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li class="search">
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </li>
                <li class=""><a href="#!" class="">First Sidebar Link</a></li>
                <li><a href="#!">Second Sidebar Link</a></li>
                <li class="no-padding active">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Dropdown <i class="material-icons">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li class="active"><a href="#!">First</a></li>
                                    <li><a href="#!">Second</a></li>
                                    <li><a href="#!">Third</a></li>
                                    <li><a href="#!">Fourth</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <div class="row">
                <div class="col s3">

                </div>
                <div class="col s9">
                    @yield('content')
                </div>
            </div>
        </div>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{asset('/materialize/')}}js/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('/materialize/')}}js/materialize.min.js"></script>
        <script type="text/javascript">
            $(".button-collapse").sideNav();
            $('.button-collapse').sideNav({
                menuWidth: 300, // Default is 300
                edge: 'left', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true, // Choose whether you can drag to open on touch screens,
                onOpen: function (el) { /* Do Stuff */
                }, // A function to be called when sideNav is opened
                onClose: function (el) { /* Do Stuff */
                }, // A function to be called when sideNav is closed
            });
        </script>
    </body>
</html>