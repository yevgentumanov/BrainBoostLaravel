<div class="slider">
    <div class="row parallax parallax0 d-flex">
        <!-- Barra de la cabecera con los social-links -->
        <header class="col-12">
            <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
            <nav class="row navbar navbar-expand-sm bg-ligth navbar-dark fixed-top cabecera">
                <!-- Logo -->
                <div class="col-4">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">
                    </a>
                </div>

                <div class="d-flex col-6 justify-content-end">
                    <form class="form-inline" action="/action_page.php">
                        <input class="form-control mr-2" type="text" placeholder="Buscar">
                        <button class="boton-arrow" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col-2">
                    <a href="{{ route('registro') }}" class="btn m-2 w-100 sombra boton-sliding-arriba">Nuevo usuario</a>
                    <a id="btnLogin" href="{{ route('login') }}" class="btn m-2 w-100 sombra boton-sliding-abajo">Iniciar
                        sesión</a>
                </div>
            </nav>


            <div class="row d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>ABRE LAS PUERTAS DEL CONOCIMIENTO, DESAFÍA TUS LÍMITES Y ALCANZA EL ÉXITO A TRAVÉS DE
                                NUESTROS EXÁMENES</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>ABRE LAS PUERTAS DEL CONOCIMIENTO, DESAFÍA TUS LÍMITES Y ALCANZA EL ÉXITO A TRAVÉS DE
                                NUESTROS EXÁMENES</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </header>
    </div>


    <div class="row">
        <div class="row parallax parallax1 d-flex">
            <div class="row d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>DESPIERTA TU CREATIVIDAD CON NUESTROS ESTUDIOS DE ARTE</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>DESPIERTA TU CREATIVIDAD CON NUESTROS ESTUDIOS DE ARTE</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down-2">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row parallax parallax2 d-flex">
            <div class="row d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>DESCUBRE EL PODER DE LA NATURALEZA</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>DESCUBRE EL PODER DE LA NATURALEZA</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down-2">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row parallax parallax3 d-flex">
            <div class="row d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>EXPLORA LAS RAÍCES DE LA HUMANIDAD Y DEMUESTRA TU CONOCIMIENTO</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>EXPLORA LAS RAÍCES DE LA HUMANIDAD Y DEMUESTRA TU CONOCIMIENTO</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down-2">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row parallax parallax4 d-flex">
            <div class="row d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>LOS IDIOMAS ABREN PUERTAS AL CONOCIMIENTO GLOBAL</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>LOS IDIOMAS ABREN PUERTAS AL CONOCIMIENTO GLOBAL</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down-2">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="parallax parallax5 d-flex">
            <div class="d-flex justify-content-center align-self-center w-100 p-bloque-texto">
                <div class="text-center p-5">
                    <div class="d-none d-xl-block texto-presentacion">
                        <h1>
                            <p>LA TECNOLOGÍA IMPULSA EL PROGRESO</p>
                        </h1>
                    </div>
                    <div class="d-xl-none texto-presentacion-m">
                        <h1>
                            <p>LA TECNOLOGÍA IMPULSA EL PROGRESO</p>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inserción del pie de página --}}
    @include('fragmentos.pie')
</div>
