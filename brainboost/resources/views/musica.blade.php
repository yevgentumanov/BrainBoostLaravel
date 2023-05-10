<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- JavaScript Opcional-->
    <!-- Primero jQuery, Segundo Popper.js, Tercero Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

    <!-- Fichero de estilo personalizado -->
    <link rel="stylesheet" href="{!!asset ('css/custom.css')!!}">

    <!-- Font Awesome 5 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>BrainBoost</title>
</head>

<body>
<div class="container-fluid">
    <!-- Barra de la cabecera con los social-links -->
    <header>
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <nav class="row navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Logo -->
            <div class="col-6">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{!!asset ('images/logo.png')!!}" alt="logo">
                </a>
            </div>


            <div class="d-flex col-4 justify-content-end">
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-2" type="text" placeholder="Buscar">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form>
            </div>
            <div class="col-2">
                <form class="form-inline justify-content-end" action="/action_page.php">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Usuario">
                    </div>
                </form>
            </div>
        </nav>

        <!-- Barra de navegación para las materias de la aplicación -->
        <nav class="row navbar bg-dark navbar-dark sticky-top">

            <!-- Modo contraido -->
            <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse"
                    data-target="#navbarMaterias" aria-controls="navbarMaterias" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>&nbsp;Materias
            </button>

            <!-- Enlace a la página de creación de test -->
            <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#"
                    aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>Crear un test personalizado
            </button>

            <!-- Links -->
            <ul class="collapse navbar-collapse" id="navbarMaterias">
                <a class="nav-link" href="{{ route('index') }}">Inicio</a>
                <a class="nav-link" href="#">Artes (Música, Artes Visuales, Teatro)</a>
                <a class="nav-link" href="#">Ciencias Naturales (Biología, Química y Física)</a>
                <a class="nav-link" href="#">Educación Física</a>
                <a class="nav-link" href="#">Filosofía</a>
                <a class="nav-link" href="#">Geografía</a>
                <a class="nav-link" href="#">Historia</a>
                <a class="nav-link" href="#">Lengua Extranjera (Inglés, Francés, Alemán, etc.)</a>
                <a class="nav-link" href="#">Literatura</a>
                <a class="nav-link" href="#">Matemáticas</a>
                <a class="nav-link" href="#">Tecnología</a>
            </ul>
        </nav>

    </header>
    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-2 p-4">
                    <img style="width: inherit;" src="{!!asset ('images/test.png')!!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>Materia</h2>
                    </div>
                    <div class="col-12">
                        <p>Descripción de la materia</p>
                    </div>
                </div>
            </section>
            {{--            <ul>--}}
            {{--                @foreach ($tests as $test)--}}
            {{--                    <li>{{ $test->nombre_test }}</li>--}}
            {{--                @endforeach--}}
            {{--            </ul>--}}


            @foreach ($tests as $test)
                <section class="row bg-primary m-4 ">
                    <div class="col-11 p-2">{{ $test->nombre_test }}</div>
                    <div class="col-1 p-2">
                        (10 preguntas)
                    </div>
                </section>
        @endforeach

    </main>
    <footer class="row bg-dark">
        <div class="col-12 col-md-6 col-lg-3 order-md-2">
            <div class="row justify-content-center">
                <a href="#">
                    <h6>WWW.BRAINBOOST.COM</h6>
                </a>
            </div>
            <div class="row">
                <a class="col-12" href="#">web</a>
            </div>
            <div class="row">
                <a class="col-12" href="#">web</a>
            </div>
            <div class="row">
                <a class="col-12" href="#">web</a>
            </div>
            <div class="row">
                <a class="col-12" href="#">web</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-md-3">
            <div class="row justify-content-center">
                <h6>INFORMACI&Oacute;N</h6>
            </div>
            <div class="row">
                <a href="" class="col-12 fa fa-clock-o p-1">&nbsp;09:00 - 21:00 (24/7)</a>
            </div>
            <div class="row">
                <a href="" class="col-12 fa fa-phone p-1">&nbsp;+34 968 26 26 33</a>
            </div>
            <div class="row">
                <a href="" class="col-12 fa fa-mobile-phone p-1">&nbsp;+34 606 58 66 58</a>
            </div>
            <div class="row">
                <a href="" class="col-12 fa fa-fax p-1">&nbsp;+34 968 26 26 34</a>
            </div>
            <div class="row">
                <a href="" class="col-12 fa fa-envelope-o p-1">&nbsp;3480348&#64;alu.murciaeduca.es</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-md-4" style="display: grid;">
            <div class="row justify-content-center">
                <h6>NUESTRAS REDES HABLAN</h6>
            </div>
            <div class="row justify-content-center align-items-center">
                <a href="https://es-es.facebook.com" class="fa fa-lg fa-facebook-square p-1"></a>
                <a href="https://www.instagram.com" class="fa fa-lg fa-instagram ico p-1"></a>
                <a href="https://es.linkedin.com" class="fa fa-lg fa-linkedin ico p-1"></a>
                <a href="https://www.whatsapp.com" class="fa fa-lg fa-whatsapp ico p-1"></a>
                <a href="https://twitter.com" class="fa fa-lg fa-twitter ico p-1"></a>
                <a href="https://twitter.com" class="fa fa-lg fa-vimeo ico p-1"></a>
                <a href="https://www.youtube.com" class="fa fa-lg fa-youtube-play ico p-1"></a>
                <a href="https://www.pinterest.es" class="fa fa-lg fa-pinterest ico p-1"></a>
            </div>
            <div class="row justify-content-center align-items-end">
                <h6>S&Iacute;GUENOS, TE GUSTAR&Aacute;</h6>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-md-1">
            <img src="{!!asset ('images/logo.png')!!}" height="40px" class="d-none mx-auto d-md-block" alt="Logo">
            <img src="{!!asset ('images/logo.png')!!}" height="40px" class="mx-auto d-md-none" alt="Logo">
        </div>
    </footer>
</div>
</body>

</html>
