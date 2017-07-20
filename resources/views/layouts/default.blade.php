<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Dashboard - Social-auth</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!--  Material Dashboard CSS    -->
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/materialicons.css')}}" rel="stylesheet"/>

    @yield('css')

</head>

<body>

<div class="wrapper">



    <div class="main-panel">
        <nav class="navbar navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <div class="picture-container hidden-lg hidden-md center-block"
                             style="margin-bottom: 50px">
                            <img style="height: 150px;width: 150px" src="{{asset('avatar/'.'default-avatar')}}"
                                 class="img-circle img-responsive center-block " title=""/>

                            <h6>{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h6>
                        </div>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">2</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">

                                <li><a href="#" id="ia"
                                       class="notificationItem">Something</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="#pablo" class="dropdown-toggle"  data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>

                            <style>
                                #ia:hover {
                                    background-color: deepskyblue !important;
                                }
                            </style>
                            <ul class="dropdown-menu" >
                                <li><a href="{{url('/')}}" id="ia" >Home</a></li>
                                <li><a href="{{ route('logout') }}"
                                       id="ia"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content" style="margin-top: 0px">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    @include('partials.footer')
</div>

</body>


<!--   Core JS Files   -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>


<script>

</script>
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material-dashboard.js')}}" type="text/javascript"></script>


<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>


@yield('js')


</html>
