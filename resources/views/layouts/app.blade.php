<!DOCTYPE html>
<html lang="en">
<head>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>MVR4</title>

        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
         <!-- Bootstrap core CSS     -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="{{ asset('assets/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

        <link href="http:////maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css' />
        <link href="{{ asset('assets/css/pe-icon-7-stroke.css" rel="stylesheet') }}" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>

        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>

</head>
<body id="app-layout">
    @if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Million Volunteer Run 4
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                                            <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registeration</a></li>
                    
                       
                </ul>
            </div>
        </div>
    </nav>
    @else
<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Million Volunteer Run 4
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="fa fa-pie-chart"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="user.html">
                            <i class="fa fa-flag-o"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fa fa-list-alt"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                </ul>
            </div>
    </div>

     <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">MVR4</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p class="hidden-lg hidden-md">MVR4</p>
                            </a>
                        </li>
                        
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                       Hi {{ Auth::user()->name }} !
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

    @endif
    @yield('content')


    <!-- <script src="{{ asset('/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
   
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>   
    <script src="{{ asset('/export_js/dataTables.buttons.min.js') }}"></script> -->

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>


    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('/assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('/assets/js/bootstrap-notify.js') }}"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ asset('/assets/js/light-bootstrap-dashboard.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $.notify({
                icon: 'pe-7s-gift',
                message: "ADMIN: Welcome to <b>Million Volunteer Run 4!</b>"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>

    <script type="text/javascript">
         $(document).ready(function() {
            $('#tbrunner').DataTable({
                "scrollX": true,
                "dom": 'Bfrtip',
                "buttons": [
                'excel', 'pdf', 'print',
                ]
            });
        } );
        
    </script>

</body>



</html>
