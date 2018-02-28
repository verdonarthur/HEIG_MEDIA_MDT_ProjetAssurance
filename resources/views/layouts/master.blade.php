<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <!-- BOOTSTRAP -->

        <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/> -->

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- APP CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleApp.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}"/>

        <!-- MATERIALIZE -->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

    </head>
    <body>
        <!-- Compiled and minified JavaScript -->
        <script src="{{ asset('assets/js/jquery-2.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/materialize.min.js') }}"></script>

        <!-- Markup -->
        <header class="navbar-fixed">
            <nav class="teal">
                <div class="nav-wrapper container">
                    <a class="brand-logo" href="{{ url('/') }}">Accueil</a>
                    <ul class="right">
                        @yield('navbar')
                    </ul>
                </div>
            </nav>
        </header>
        <main class="container">

            <h3>@yield('content-title')</h3>

            {{-- will be used to show any messages --}}
            @if ( session()->has('success'))
                <div class="card-panel success">{{ session('success') }}</div>
            @endif
            @if ( session()->has('info'))
                <div class="card-panel info">{{ session('info') }}</div>
            @endif
            @if ( session()->has('warning'))
                <div class="card-panel warning">{{ session('warning') }}</div>
            @endif
            @if ( session()->has('error'))
                <div class="card-panel error">{{ session('error') }}</div>
            @endif

            @if (count($errors) > 0)
                <div class="card-panel error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                @yield('content')
            </div>

        </main>
        <footer class="page-footer teal lighten-1">
            <div class="footer-copyright">
                <div class="container">
                    Comem+ | 2017 - 2018 | Modélisation des traitements
                    <span class="right">
                        <a href="mailto:gabor.maksay@heig-vd.ch" class="amber-text text-lighten-3">Maksay Gabor</a> & <a href="mailto:mathias.oberson@heig-vd.ch" class="amber-text text-lighten-3">Mathias Oberson</a>
                    </span>
                </div>
            </div>
        </footer>
    </body>
</html>