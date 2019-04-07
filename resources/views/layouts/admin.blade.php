<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/css/custom.min.css')}}" rel="stylesheet">

    <style>
        .panel_toolbox > li > a.btn.btn-primary {
            color: #fff;
        }

        .panel_toolbox > li > a.btn.btn-primary:hover {
            background: #286090;
        }

        .invalid-feedback {
            color: red;
            font-style: italic;
            font-size: 12px;
        }
    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    {{--<a href="index.html" class="site_title"><span>Gentelella Alela!</span></a>--}}
                </div>

                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">

                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{route('books.index')}}">
                                    <i class="fa fa-dashboard"></i> Books
                                </a>
                            </li>
                            <li>
                                <a href="{{route('lends.index')}}">
                                    <i class="fa fa-dashboard"></i> Lends
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <img src="images/img.jpg" alt="">{{auth()->user()->name}}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="login.html"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endauth


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    {{--<div class="title_left">--}}
                    {{--<h3>Plain Page</h3>--}}
                    {{--</div>--}}

                    {{--<div class="title_right">--}}
                    {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="button">Go!</button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    @if(session()->has('msg') && session('msg'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>{!! session('msg') !!}</strong>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>Validation Error</strong>
                        </div>
                    @endif
                </div>

                <div class="clearfix"></div>

                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Library Management System
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('assets/admin/vendors/nprogress/nprogress.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('assets/admin/js/custom.min.js')}}"></script>

@yield('js')
</body>
</html>
