<!-- Barra de la cabecera con los social-links -->
<header>
    <div class="cabecera-log">
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <nav class="row w-100 m-0 navbar navbar-expand-sm cabecera-log-nav">
            <!-- Logo -->
            <div class="col-4">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">
                </a>
            </div>

            <div class="col-6 d-flex justify-content-end">
            </div>

            <style>

            </style>
            <div class="col-2">
                <div class="dropdown">
                    <button class="btn m-2 w-100 sombra bt-log dropdown-toggle" type="button" id="accountDropdown" data-toggle="dropdown">
                        <span class="dropdown-toggle-text">Cuenta: </span>
                        {{ auth()->user()->nombre_usuario }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('cuenta') }}">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Barra de navegación para las materias de la aplicación -->
    <nav class="row w-100 m-0 navbar bg-dark navbar-light sticky-top">

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

        <!-- Opciones de cada submenú -->
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
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Idiomas']) }}">Todos</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Inglés']) }}">Inglés</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Francés']) }}">Francés</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Italiano']) }}">Italiano</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Alemán']) }}">Alemán</a>
        </ul>
        <ul class="collapse navbar-collapse" id="navbarTecnología">
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Tecnología']) }}">Tecnología</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Informática']) }}">Informática</a>
        </ul>

    </nav>
</header>
