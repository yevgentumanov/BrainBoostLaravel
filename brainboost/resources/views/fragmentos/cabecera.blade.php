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
    <nav class="row navbar bg-dark navbar-light sticky-top">

        <!-- Modo contraido -->
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#navbarMaterias"
                aria-controls="navbarMaterias" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>&nbsp;Materias
        </button>

        <!-- Enlace a la página de creación de test -->
        <button class="navbar-toggler nav-ico" type="button" data-toggle="collapse" data-target="#" aria-controls=""
                aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>Crear un test personalizado
        </button>

        <!-- Links -->
        <ul class="collapse navbar-collapse" id="navbarMaterias">
            <a class="nav-link" href="{{ route('index') }}">Inicio</a>
            <a class="nav-link" href="{{ route('artes') }}">Artes (Artes Visuales, Teatro)</a>
            <a class="nav-link" href="{{ route('musica') }}">Música</a>
            <a class="nav-link" href="{{ route('cienciasnaturales') }}">Ciencias Naturales (Biología, Química y
                Física)</a>
            <a class="nav-link" href="{{ route('matematicas') }}">Matemáticas</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Educación Física', 'idMateria' => '9']) }}">Educación Física</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Filosofía', 'idMateria' => '10']) }}">Filosofía</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Geografía', 'idMateria' => '11']) }}">Geografía</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Historia', 'idMateria' => '12']) }}">Historia</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Literatura', 'idMateria' => '17']) }}">Literatura</a>
            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Tecnología', 'idMateria' => '19']) }}">Tecnología</a>
        </ul>

    </nav>
</header>
