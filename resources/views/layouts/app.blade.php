<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-light">

    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

            <div class="container-fluid">

                <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">

                    Gestión Condominio

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @auth

                    <!-- MENU IZQUIERDO -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- DASHBOARD -->
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('dashboard') }}">

                                Dashboard

                            </a>

                        </li>

                        <!-- CONDOMINIOS -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                Condominios

                            </a>

                            <ul class="dropdown-menu">

                                <li>

                                    <a class="dropdown-item" href="{{ route('condominios.index') }}">

                                        Listado Condominios

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item" href="{{ route('condominios.create') }}">

                                        Nuevo Condominio

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <!-- BLOCKS -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                Blocks

                            </a>

                            <ul class="dropdown-menu">

                                <li>

                                    <a class="dropdown-item" href="{{ route('blocks.index') }}">

                                        Listado Blocks

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item" href="{{ route('blocks.create') }}">

                                        Nuevo Block

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <!-- INQUILINOS -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                Inquilinos

                            </a>

                            <ul class="dropdown-menu">

                                <li>

                                    <a class="dropdown-item" href="{{ route('inquilinos.index') }}">

                                        Listado Inquilinos

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item" href="{{ route('inquilinos.create') }}">

                                        Nuevo Inquilino

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <!-- GASTOS COMUNES -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                Gastos Comunes

                            </a>

                            <ul class="dropdown-menu">

                                <li>

                                    <a class="dropdown-item" href="{{ route('gastos-comunes.index') }}">

                                        Listado

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item" href="{{ route('gastos-comunes.create') }}">

                                        Registrar

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <!-- REPORTES -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                Reportes

                            </a>

                            <ul class="dropdown-menu">

                                <li>

                                    <a class="dropdown-item" href="{{ route('reportes.index') }}">

                                        Reporte General

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item" href="{{ route('reportes.consulta-rut') }}">

                                        Consulta por RUT

                                    </a>

                                </li>

                            </ul>

                        </li>

                    </ul>

                    @endauth

                    <!-- MENU DERECHO -->
                    <ul class="navbar-nav ms-auto">

                        @guest

                        @if (Route::has('login'))

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('login') }}">

                                Login

                            </a>

                        </li>

                        @endif

                        @else

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>

                                    <a class="dropdown-item" href="{{ route('dashboard') }}">

                                        Dashboard

                                    </a>

                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>

                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">

                                        Cerrar Sesión

                                    </a>

                                </li>

                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>

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
