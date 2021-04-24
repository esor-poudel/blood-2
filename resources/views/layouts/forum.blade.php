<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <style>
        #mapid { height: 180px; }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Fonts -->
       <link rel="dns-prefetch" href="//fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

       <!-- Styles -->
     
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
       <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>


{{-- 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    Easy Blood Portal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
{{--         
            @if(count($errors)> 0)
            <div id="error_copy">
        <ul class="list-group-item">
        @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">{{$error}}</li>
        @endforeach
        </ul>
    </div>
        
    @endif --}}
        <main class="py-4">
             <div class="container">
                <div class="row">
                   <div class="col-lg-4">
                     <ul class="list-group">
                        @if(Auth::check())
                     <li class="list-group-item">
                            <a href="{{route('donar.show')}}">Become a donor </a>
                     </li>

                          
                     <li class="list-group-item">
                        <a href="{{route('profile.index')}}">Update Profile </a>
                     </li>
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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}" ></script>
   
    <script>
     @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
    @endif
    
    $(document).ready(function(){
       $('select[name="district"]').on('change',function(){
            var district_id = $(this).val();
            //console.log(district_id);
            if(district_id)
            {
                console.log(district_id);
                $.ajax({
                    url: '/getCity/'+district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data)
                    {
                        console.log(data);
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>')
                        });
                    }

                });
            }else
            {
                $('select[name="city"]').empty();

            }
       });
    });
    
    </script>
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
     integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
     crossorigin=""></script>
     
     <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
     <script>
        var map = L.map('mapid').setView([27.7052, 85.3349], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([27.7052, 85.3349]).addTo(map)
                .bindPopup('donor')
                .openPopup();

          
     </script>
</body>
</html>
