<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mapa.js') }}" defer></script>
    {{-- <script src="https://unpkg.com/esri-leaflet" defer></script> --}}
    {{-- <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" defer> </script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/principal/template.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link
        rel="stylesheet"
        href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/> --}}
    {{-- <link
      rel="stylesheet"
      href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
    /> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg=" crossorigin="anonymous" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="z-index: 100; background:#0D8BD9; position:fixed; width:100%">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                         @if (auth()->check() && auth()->user()->roles[0]->rolname == "Administrador")
                        <li class="nav-item">
                                <a class="nav-link" href="">Contenido</a> {{-- Crear contenido para modulos..
                                                                               Crear  --}}
                        </li>    
                        @endif 
                        <li class="nav-item">
                            <a class="nav-link" href="">Subir Imagenes</a> {{-- Mostrar Comentarios sobre las rutas y sitios--}}
                        </li>    
                        <ul class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('images.sitio') }}">Imagenes Sitios</a> {{-- Crear contenido para modulos..
                                                                               Crear  --}}
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('images.route') }}">Imagenes Rutas</a> {{-- Crear contenido para modulos..
                                                                           Crear  --}}
                        </li>    
                        </ul>    
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

        <main class="py-4" style="margin-top:0px;">
            @yield('content')
            @yield('styles')
            @yield('scripts')
        </main>
    </div>
    
    <pagina-principal></pagina-principal>
    
</body>
</html>
