<div class="parallax0">
    <!-- Barra de la cabecera con los social-links -->
    <header>
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <nav class="row navbar navbar-expand-sm bg-ligth navbar-dark fixed-top cabecera">
            <!-- Logo -->
            <div class="col-6">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">
                </a>
            </div>

            <div class="d-flex col-4 justify-content-end">
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-2" type="text" placeholder="Buscar">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form>
            </div>
            <div class="col-2">
                <a href="{{ route('registro') }}" class="btn btn-secondary m-2 w-100 sombra">Nuevo usuario</a>
                <a href="{{ route('login') }}" class="btn btn-primary m-2 w-100 sombra">Iniciar sesión</a>
        </nav>


        <div class="d-flex justify-content-center">
            <div class="">
                <div class="text-justify p-5 texto-presentacion" style="white-space: pre-wrap;">
                    <h1>
                        <p style="font-size: 160%;">ABRE LAS PUERTAS DEL CONOCIMIENTO, DESAFÍA TUS LÍMITES Y ALCANZA EL ÉXITO A TRAVÉS DE NUESTROS EXÁMENES</p>
                    </h1>
                </div>
                <div class="s-subtitle">
                    <div class="s-component s-text">
                        <div class="">
                            <div class="s-component-content s-font-heading" style="white-space: pre-wrap;">
                                <h4>
                                    <div>My name is Quinnton Harris, and I am a beautiful mosaic of lived-experience and
                                        culture.</div>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="parallax"></div>

    <div style="height:1000px;background-color:red;font-size:36px">
        Scroll Up and Down this page to see the parallax scrolling effect.
        This div is just here to enable scrolling.
        Tip: Try to remove the background-attachment property to remove the scrolling effect.
        </div>

    <div class="parallax"></div> --}}


        <!-- Barra de navegación para las materias de la aplicación -->
        {{-- <nav class="row navbar bg-dark navbar-light sticky-top">

        <!-- Modo contraido -->
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#" aria-controls=""
            aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span><a class="nav-link" href="{{ route('index') }}">Inicio</a>
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarArtes"
            aria-controls="navbarArtes" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>&nbsp;Artes
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarNaturales"
            aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>&nbsp;Naturales
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarHumanidades"
            aria-controls="navbarHumanidades" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>&nbsp;Humanidades
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarIdiomas"
            aria-controls="navbarIdiomas" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>&nbsp;Idiomas
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarMatematicas"
            aria-controls="navbarMatematicas" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Matemáticas']) }}">Matemáticas</a>
        </button>
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarTecnología"
            aria-controls="navbarTecnología" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>&nbsp;Tecnología
        </button>

        <!-- Enlace a la página de creación de test -->
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#" aria-controls=""
            aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>Crear un test personalizado
        </button>

        <ul class="collapse navbar-collapse" id="navbarCategorias">
            <li class="navbar-brand" data-toggle="collapse" data-target="#navbarArtes">Artes</li>
            <li class="navbar-brand" data-toggle="collapse" data-target="#navbarNaturales">Naturales</li>
            <li class="navbar-brand" data-toggle="collapse" data-target="#navbarHumanidades">Humanidades</li>
            <li class="navbar-brand" data-toggle="collapse" data-target="#navbarIdiomas">Idiomas</li>
            <li class="navbar-brand" data-toggle="collapse" data-target="#navbarTecnología">Tecnología</li>
        </ul>

        <!-- Links -->
        <ul class="collapse navbar-collapse" id="navbarArtes">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Artes']) }}">Artes</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Música']) }}">Música</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Artes Visuales']) }}">Artes
                Visuales</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Teatro']) }}">Teatro</a>
        </ul>
        <ul class="collapse navbar-collapse" id="navbarNaturales">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Ciencias Naturales']) }}">Ciencias
                Naturales</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Biología']) }}">Biología</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Química']) }}">Química</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Física']) }}">Física</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Educación Física']) }}">Educación
                Física</a>
        </ul>
        <ul class="collapse navbar-collapse" id="navbarHumanidades">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Literatura']) }}">Literatura</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Historia']) }}">Historia</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Geografía']) }}">Geografía</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Filosofía']) }}">Filosofía</a>
        </ul>
        <ul class="collapse navbar-collapse" id="navbarIdiomas">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Inglés']) }}">Inglés</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Francés']) }}">Francés</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Italiano']) }}">Italiano</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Alemán']) }}">Alemán</a>
        </ul>
        <ul class="collapse navbar-collapse" id="navbarTecnología">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Tecnología']) }}">Tecnología</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Informática']) }}">Informática</a>
        </ul>

    </nav> --}}




    </header>
</div>
<div class="parallax1">
    Scroll Up and Down this page to see the parallax scrolling effect.
    This div is just here to enable scrolling.
    Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>
<div class="parallax2">
    Scroll Up and Down this page to see the parallax scrolling effect.
    This div is just here to enable scrolling.
    Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>
<div class="parallax3">
    Scroll Up and Down this page to see the parallax scrolling effect.
    This div is just here to enable scrolling.
    Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>
<div class="parallax4">
    Scroll Up and Down this page to see the parallax scrolling effect.
    This div is just here to enable scrolling.
    Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>
<div class="parallax5">
    Scroll Up and Down this page to see the parallax scrolling effect.
    This div is just here to enable scrolling.
    Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>
