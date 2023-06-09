{{-- Bloque deslizante --}}
<div class="row slider">
    <!-- Barra de la cabecera con los social-links -->
    <header>
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <nav class="row w-100 navbar navbar-expand-sm bg-ligth navbar-dark fixed-top cabecera">
            <!-- Logo -->
            {{--            <div id="logo" class="col-12 col-sm-6">--}}
            {{--                <a class="navbar-brand" href="{{ route('index') }}">--}}
            {{--                    <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">--}}
            {{--                </a>--}}
            {{--            </div>--}}
            <div id="logo" class="col-12 col-sm-6">
                <a class="navbar-brand" href="/">
                    <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}"
                         alt="logo">
                </a>
            </div>

            <!-- Barra de búsqueda -->
            <div class="d-none col-6 justify-content-end">
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-2" type="text" placeholder="Buscar">
                    <button class="boton-arrow" type="submit">Buscar</button>
                </form>
            </div>

            <!-- Inicio de sesión y registro de usuario -->
            <div id="identificacion" class="col-12 col-sm-6 d-flex justify-content-end">
                <div class="row">
                    <div id="btnRegistro" class="col-12 btn m-2 sombra boton-sliding-arriba">Nuevo usuario</div>
                    <div id="btnLogin" class="col-12 btn m-2 sombra boton-sliding-abajo">Iniciar sesión</div>

                </div>
            </div>
        </nav>
    </header>

    {{-- ********************************************** PARALLAX 0 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax0">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
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
        </div>
    </div>

    {{-- ********************************************** PARALLAX 1 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax1">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
                        <h1>
                            <p>DESPIERTA TU CREATIVIDAD CON NUESTROS ESTUDIOS DE ARTE</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    {{-- ********************************************** PARALLAX 2 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax2">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
                        <h1>
                            <p>DESCUBRE EL PODER DE LA NATURALEZA</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    {{-- ********************************************** PARALLAX 3 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax3">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
                        <h1>
                            <p>EXPLORA LAS RAÍCES DE LA HUMANIDAD Y DEMUESTRA TU CONOCIMIENTO</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    {{-- ********************************************** PARALLAX 4 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax4">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
                        <h1>
                            <p>LOS IDIOMAS ABREN PUERTAS AL CONOCIMIENTO GLOBAL</p>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center indicador-down">
                <img src="{!! asset('images/indicadorDown.png') !!}" alt="">
            </div>
        </div>
    </div>

    {{-- ********************************************** PARALLAX 5 ********************************************** --}}
    <div class="row">
        <div class="row m-0 parallax parallax5">
            <div class="col-12 d-flex justify-content-center align-self-center">
                <div class="text-center p-5">
                    <div class="texto-presentacion">
                        <h1>
                            <p>LA TECNOLOGÍA IMPULSA EL PROGRESO</p>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        {{-- Inserción del pie de página --}}
        @include('fragmentos.pie')
    </div>
    {{-- ***************************************************************************************************************************************** --}}
    {{-- ***************************************************************************************************************************************** --}}
    {{-- ***************************************************************************************************************************************** --}}

    <!-- Formulario de inicio de sesión -->
    <div id="c-login" class="d-none container superpuesto" tabindex="0">
        <div class="row justify-content-center">
            <div id="divlogin" class="col-7 p-0">
                <div class="card sombra_borde card-portada">
                    <div class="card-body pt-0">
                        <div class="row d-flex justify-content-end">
                            <div class="exit-card text-right p-0">X</div>
                        </div>
                        <form action="{{ route('logintoapp') }}" method="POST">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="row justify-content-center pt-3 pl-5 pr-5">
                                <div class="col-12 pb-4">
                                    <button type="submit" class="btn btn-5">Iniciar sesión</button>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-5">Recuperar contraseña</button>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-center pt-4 pl-5 pr-5">
                            <form action="/google-auth/redirect" method="GET">
                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-5">Iniciar con Google</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ***************************************************************************************************************************************** --}}
    {{-- ***************************************************************************************************************************************** --}}
    {{-- ***************************************************************************************************************************************** --}}

    <!-- Formulario de registro -->
    <div id="c-registro" class="d-none container superpuesto" tabindex="1">
        <div class="row justify-content-center">
            <div id="divregistro" class="col-7">
                <div class="card sombra_borde card-portada">
                    <div class="card-body pt-0">
                        <div class="row d-flex justify-content-end">
                            <div class="exit-card text-right p-0">X</div>
                        </div>
                        <form action="{{ route('registrar') }}" method="POST">
                            @csrf
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de usuario</label>
                                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" id="u-email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email_confirmation">Confirmar correo electrónico</label>
                                <input type="email" id="email_confirmation" name="email_confirmation"
                                       class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="u-password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input type="password" id="u-password_confirmation" name="password_confirmation"
                                       class="form-control" required>
                            </div>

                            <div class="row justify-content-center pt-3 pl-5 pr-5">
                                <button type="submit" class="btn btn-5">Enviar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
