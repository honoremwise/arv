<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ARV') }}</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ARV') }}
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
                        @if(Auth::user()->user_role=="admin") 
                 <li class="nav-item">
                    <a href="{{'/home'}}" class="nav-link">Record patients</a>
                </li>
                  <li class="nav-item">
                 <a href="{{'/importExportView'}}" class="nav-link">imp vs exp</a>
                <!-- maximum year refilling period rage of next fill-->
                </li> 
                
                 <li class="nav-item">
                <a href="{{'/patients'}}" class="nav-link">patients</a>
                </li>
                 <li class="nav-item">
                  <a href="{{'/refill'}}" class="nav-link">Refillings</a>
                 </li>
                 <li class="nav-item">
                  <a href="{{'/Users'}}" class="nav-link">Users</a>
                 </li>
                @endif 
                @if (Auth::user()->user_role=='arv-cc') 
                    <li class="nav-item">
                  <a href="{{'/refill'}}" class="nav-link">Refillings</a>
                 </li>
                @endif
                @if (Auth::user()->user_role=='arv-health') 
                    <li class="nav-item">
                    <a href="{{'/home'}}" class="nav-link">Record patients</a>
                </li>
                  <li class="nav-item">
                 <a href="{{'/importExportView'}}" class="nav-link">imp vs exp</a>
                <!-- maximum year refilling period rage of next fill-->
                </li> 
                
                 <li class="nav-item">
                <a href="{{'/patients'}}" class="nav-link">patients</a>
                </li>
                 <li class="nav-item">
                  <a href="{{'/refill'}}" class="nav-link">Refillings</a>
                 </li>
                @endif
                              
              
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{Auth::user()->user_role}} <span class="caret"></span>
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>