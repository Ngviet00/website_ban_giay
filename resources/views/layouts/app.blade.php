<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div id="page">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
</div>
{{--    <div id="app">--}}
{{--        <nav class="" role="navigation">--}}
{{--            <div class="top-menu">--}}
{{--                <div class="container">--}}
{{--                    <div class="row d-flex align-items-center justify-content-between">--}}
{{--                        <div>--}}
{{--                            <a href="index.html">--}}
{{--                                <img src="./images/logo.png" alt="" style="width: 200px">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex align-items-center border-dark form-search">--}}
{{--                            <div>--}}
{{--                                <form action="" class="border-none position-relative">--}}
{{--                                    <i class="fa fa-search position-absolute" aria-hidden="true" style="top: 10px;left: 8px"></i>--}}
{{--                                    <input type="text" style="padding-left: 30px" placeholder="Search">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <a href="">--}}
{{--                                    <i class="fa fa-map-marker" aria-hidden="true"></i>--}}
{{--                                    Choose a store--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <a href="">--}}
{{--                                    <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                                    Account--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <a href="">--}}
{{--                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>--}}
{{--                                    Bag--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="sub-menu mt-2">--}}
{{--                    <ul class="d-flex justify-content-center">--}}
{{--                        <li>--}}
{{--                            <a href="">home</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="men.html">product</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="cart.html">cart</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="about.html">about</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="contact.html">contact</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup-options.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
