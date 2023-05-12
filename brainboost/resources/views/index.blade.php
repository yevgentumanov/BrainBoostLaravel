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
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <title>BrainBoost</title>
</head>

<body>
<div class="container-fluid">
    <!-- Barra de la cabecera con los social-links -->
    <header>
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <nav class="row navbar navbar-expand-sm bg-ligth navbar-dark">
            <!-- Logo -->
            <div class="col-6">
                <a class="row" class="navbar-brand" href="#">
                    <img class="col-4" style="margin: inherit; height: fit-content;"
                         src="{!!asset ('images/logo.png')!!}" alt="logo" style="width:40px;">beta
                    {{--<img class="col-4" src="{!!asset ('images/logo.png')!!}" alt="logo" style="width:40px;">--}}
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
        @include('fragments.menuInicio')

    </header>
    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4 p-4">
                <div class="col-12 d-flex justify-content-center">
                    <h2>Test realizados recientemente</h2>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="{{ route('test') }}">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="row bg-primary m-4 p-4">
                <div class="col-12 d-flex justify-content-center">
                    <h2>Test relacionados</h2>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="row bg-primary m-4 p-4">
                <div class="col-12 d-flex justify-content-center">
                    <h2>Test m&aacute;s populares</h2>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-2">
                    <article class="border border-box m-2 d-flex justify-content-center bg-light">
                        <div class="row">
                            <div class="col-12">
                                <a class="row d-flex justify-content-center" href="#">
                                    <img class="col-12" style="margin: inherit;" src="{!!asset ('images/test.png')!!}"
                                         alt="logo" style="width:40px;">
                                </a>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                                <h3>Test 1</h3>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </main>
    {{--    incluimos footer--}}
    @include('fragments.footer')

</div>
</body>

</html>
