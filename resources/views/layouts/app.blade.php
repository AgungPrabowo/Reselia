<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
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
                        Reselia
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            @can('admin-access')
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-btn fa-tags"></i> Categories</a></li>
                                        <li><a href="{{ route('products.index') }}"><i class="fa fa-btn fa-tags"></i> Products</a></li>
                                    </ul>
                                </li>
                            @endcan
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if(Session::has('flash_notification.0.message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('flash_notification.0.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_notification.0.message') }}
                </div>
            </div>
        @endif
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
