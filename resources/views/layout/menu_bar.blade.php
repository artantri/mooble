<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Bootstrap -->
        <link href="{{ asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('gentelella-master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

        <!-- Datatables -->
        <link href="{{ asset('gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="{{ asset('gentelella-master/build/css/custom.css') }}" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="pasienSearch.html" class="site_title"><img src="{{ url('/images/logo_mooble_white.png') }}" style="padding-left: 4px;, margin:auto;"></a>
                        </div>
                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-user-md"></i> Profil Saya <span class="fa fa-chevron-down"></span></a>
                                    </li>
                                    <li><a href="pasienSearch.php"><i class="fa fa-wheelchair"></i> Pasien <span class="fa fa-chevron-down"></span></a>
                                    </li>
                                    <li><a href="staff.php"><i class="fa fa-hospital-o"></i> Staff <span class="fa fa-chevron-down"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- top navigation Masih akan diedit nanti-->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <ul class="nav navbar-nav navbar-right">
                                <li role="presentation" class="dropdown" style="padding-right:10px;">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-comment"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- content -->
                <div class="right_col" role="main">
                         @yield('content')
                </div>
                <!-- /page content -->


            </div>
        </div>


        <!-- jQuery -->
        <script src="{{ asset('gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('gentelella-master/vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{ asset('gentelella-master/vendors/nprogress/nprogress.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('gentelella-master/vendors/datatables.net/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>

        <!-- Custom Theme Scripts -->
        <script src="{{ asset('gentelella-master/build/js/custom.js') }}"></script>

    </body>
</html>