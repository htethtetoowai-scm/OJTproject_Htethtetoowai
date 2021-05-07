<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <h3 style="color:#1589FF">BuletinBoard</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                @if(Auth::user()->type==0)
                    <a href="{{route('posts.index')}}" class="nav-item nav-link">Posts</a>
                    <a href="{{route('users.index')}}" class="nav-item nav-link">Users</a>
                @else
                @endif
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('showUserProfile',Auth::user()->id)}}">Profile</a>
                            <a class="dropdown-item" href="{{route('logout')}}">{{ __('Logout') }}</a>
                        </div>
                    </div>   
                @endguest
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    @yield('content')
</div>
</div>    
</body>
</html>