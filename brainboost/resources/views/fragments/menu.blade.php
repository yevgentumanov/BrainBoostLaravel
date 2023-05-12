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
            <a class="nav-link" href="{{ route('materia') }}">Educación Física</a>
            <a class="nav-link" href="{{ route('materia') }}">Filosofía</a>
            <a class="nav-link" href="{{ route('materia') }}">Geografía</a>
            <a class="nav-link" href="{{ route('materia') }}">Historia</a>
            <a class="nav-link" href="{{ route('materia') }}">Lengua Extranjera (Inglés, Francés, Alemán, etc.)</a>
            <a class="nav-link" href="{{ route('materia') }}">Literatura</a>
            <a class="nav-link" href="{{ route('materia') }}">Tecnología</a>
        </ul>

    </nav>
</header>
