<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Book Library</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/listing/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{asset('assets/listing/css/simple-line-icons.css')}}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{asset('assets/listing/css/themify-icons.css')}}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{asset('assets/listing/css/set1.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/listing/css/style.css')}}">
</head>
{{--<body>--}}
{{--<div id="app">--}}
{{--<div class="nav-menu">--}}
{{--<div class="bg transition">--}}
{{--<div class="container-fluid fixed">--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<nav class="navbar navbar-expand-lg navbar-light">--}}
{{--<a class="navbar-brand" href="index.html">Book Library</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse"--}}
{{--data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"--}}
{{--aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="icon-menu"></span>--}}
{{--</button>--}}
{{--<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">--}}
{{--<ul class="navbar-nav">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="#">Blog</a>--}}
{{--</li>--}}
{{--<li><a href="#" class="btn btn-outline-light top-btn"><span class="ti-plus"></span>--}}
{{--Add Listing</a></li>--}}

{{--@guest--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--</li>--}}
{{--@if (Route::has('register'))--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link"--}}
{{--href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"--}}
{{--role="button"--}}
{{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<div class="dropdown-menu dropdown-menu-right"--}}
{{--aria-labelledby="navbarDropdown">--}}
{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<main class="py-4">--}}
{{--@yield('content')--}}
{{--</main>--}}
{{--</div>--}}
{{--<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>--}}
{{--<!-- jQuery, Bootstrap JS. -->--}}
{{--<!-- jQuery first, then Popper.js, then Bootstrap JS -->--}}
{{--<script src="{{asset('assets/listing/js/jquery-3.2.1.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/listing/js/popper.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/listing/js/bootstrap.min.js')}}"></script>--}}

{{--<script>--}}
{{--$(window).scroll(function() {--}}
{{--// 100 = The point you would like to fade the nav in.--}}

{{--if ($(window).scrollTop() > 100) {--}}

{{--$('.fixed').addClass('is-sticky');--}}

{{--} else {--}}

{{--$('.fixed').removeClass('is-sticky');--}}

{{--};--}}
{{--});--}}
{{--</script>--}}
{{--</body>--}}

<body>
<!--============================= HEADER =============================-->
<div class="nav-menu" style="background: #0000007d">
    <div class="bg transition">
        <div class="container-fluid fixed">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">Book Library</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
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
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('myLends')}}">My Lends</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SLIDER -->

@yield('content')

<footer class="main-block dark-bg py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright &copy; {{now()->year}} Book Liberary. All rights reserved</p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    {{--<ul>--}}
                    {{--<li><a href="#"><span class="ti-facebook"></span></a></li>--}}
                    {{--<li><a href="#"><span class="ti-twitter-alt"></span></a></li>--}}
                    {{--<li><a href="#"><span class="ti-instagram"></span></a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//END FOOTER -->


<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jQuery, Bootstrap JS. -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/listing/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/listing/js/popper.min.js')}}"></script>
<script src="{{asset('assets/listing/js/bootstrap.min.js')}}"></script>

<script>
    $(window).scroll(function () {
// 100 = The point you would like to fade the nav in.

        if ($(window).scrollTop() > 100) {

            $('.fixed').addClass('is-sticky');

        } else {

            $('.fixed').removeClass('is-sticky');

        }
        ;
    });
</script>

@yield('js')
</body>

</html>
