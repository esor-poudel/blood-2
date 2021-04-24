<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Easy Blood Portal</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Easy Blood Portal(admin)
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown" id="markasread" onclick="marknotificationasread()">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="glyphicon glyphicon-envelope"></span>Notifications<span
                                    class="badge badge-light">{{count(auth()->user()->unreadNotifications)}}</span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                    @include('layouts.notifications.'.snake_case(class_basename($notification->type)))
                                    @empty
                                    no donar yet
                                    @endforelse
                                </li>

                            </ul>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <p style="color: red">Logout</p>
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
            </div>
        </nav>
        @if(count($errors)> 0)
        <ul class="list-group-item">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="list-group">
                            @if(Auth::check())
                            @if (Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('donar')}}">New Donars</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('register.donar')}}">All Registered Donars</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('events.create')}}">Create Event</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('events.index')}}">All Event</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('blood.request')}}">Requested Blood </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('bloodbanks.index')}}">Blood Bank </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('bloodbanks.create')}}">Add Blood Bank </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('settings.create')}}">Create Setting</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('settings.index')}}">View Setting</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('enquiry.index')}}">View Enquiry</a>
                            </li>
                            
                            <li class="list-group-item">
                                <a href="{{route('city.add')}}">Add City</a>
                            </li>
                            @endif
                            @endif

                        </ul>
                    </div>

                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif
        @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
        @endif
    </script>

</body>

</html>