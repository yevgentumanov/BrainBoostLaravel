<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id"
        content="392754918179-b3ti3nc66u28g6chl55u8s77ethje5nu.apps.googleusercontent.com">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- JavaScript Opcional-->
    <!-- Primero jQuery, Segundo Popper.js, Tercero Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>

    <!-- Fichero de estilo personalizado -->
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}">

    <!-- Font Awesome 5 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="{!! asset('images/favicon.ico') !!}">

    <!-- JavaScript: Cabecera login -->
    <script src="{!! asset('js/login.js') !!}"></script>

    <!-- JavaScript: Política de cookies -->
    <script src="{!! asset('js/politicaCookies.js') !!}"></script>

    <!-- JavaScript: páginas en general -->
    <script src="{!! asset('js/main.js') !!}"></script>

    <!-- Boton Scroll up -->
    <script src="{!! asset('js/scrollBtn.js') !!}"></script>

    <!-- JavaScript: lógica test -->
    @isset($enableScriptTest)
        @if ($enableScriptTest == true)
            <script src="{!! asset('js/utilidades.js') !!}"></script>
            <script src="{!! asset('js/globals.js') !!}"></script>
            <script src="{!! asset('js/JSON/api_rest.js') !!}"></script>
            <script src="{!! asset('js/JSON/json.js') !!}"></script>

            <script src="{!! asset('js/MateriaModel.js') !!}"></script>
            {{--
            <script src="{!! asset('js/TestModel.js') !!}"></script>
            <script src="{!! asset('js/TestController.js') !!}"></script> --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> <!-- Importa la librería de Vue.js --> --}}
            {{-- <script src="{!! asset('js/TestVue.js') !!}"></script> --}}
            @vite('public/js/TestVue.js')
        @endif
    @else
        {{-- @vite() --}}
    @endisset
    <!-- Título de la página -->
    <title>BrainBoost</title>
</head>


<body>
    <div class="container-fluid">

        {{-- Inserción de la cabecera --}}
        @auth
            @include('fragmentos.cabeceraLogoff')
        @else
            @include('fragmentos.cabeceraLogin')
        @endauth

        <!-- Identificador de ventanas -->
        {{-- <div id="ventana" class="row d-bg">
            <div class="col-12 d-sm-none">
                <h2 class="font-weight-bold">movil</h2>
            </div>
            <div class="col-12 d-none d-sm-block d-md-none">
                <h2 class="font-weight-bold">tablet - sm</h2>
            </div>
            <div class="col-12 d-none d-md-block d-lg-none">
                <h2 class="font-weight-bold">tablet - md</h2>
            </div>
            <div class="col-12 d-none d-lg-block d-xl-none">
                <h2 class="font-weight-bold">pc - lg</h2>
            </div>
            <div class="col-12 d-none d-xl-block">
                <h2 class="font-weight-bold">tv - xl</h2>
            </div>
        </div> --}}

        {{-- Punto de inserción del main en cada página --}}
        @yield('main')

        @auth
            @include('fragmentos.pie')
        @endauth
    </div>
</body>

</html>
