<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RDI - SYS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
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
                    <h5>Sistema de Comunicacion</h5><h4 class="text-danger">RDI</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingreso') }}</a>
                                </li>
                            @endif

                             @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                        <li><a class="nav-link" href="{{ route('users.index') }}">Gestion Usuarios</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Gestion Roles</a></li>
                            <li><a class="nav-link" href="{{ route('proyects.index') }}">Gestion Proyectos</a></li>
                            <li><a class="nav-link" href="{{ route('rdis.index') }}">Gestion RDI</a></li>
                            <ul>
                                <a class="nav-link">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
        
                                        <button class="btn btn-sm btn-outline-danger my-2 my-sm-0">logout</button>
                                    </form>
                                </a>
                            </ul>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor=>{
            console.log(editor);
        })
        .catch(error=>{
            console.error(error);
        });
    </script>
</body>

</html>
