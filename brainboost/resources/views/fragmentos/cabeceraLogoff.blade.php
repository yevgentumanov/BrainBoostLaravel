<!-- Barra de la cabecera con los social-links -->
<header>
    <div class="cabecera-log">
        <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
        <div class="row w-100 m-0 cabecera-log">
            <!-- Barra de navegación con el logotipo, la barra de búsqueda y el login -->
            <nav class="row w-100 m-0 navbar cabecera-log-nav">
                <!-- Logo -->
                <div class="col-12 d-flex justify-content-center d-lg-none">
                    <a href="{{ route('index') }}">
                        <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">
                    </a>
                </div>
                <div class="d-none col-lg-6 d-lg-flex justify-content-start">
                    <a href="{{ route('index') }}">
                        <img src="{!! asset('images/Logo_letras_chicas_con_sombra en blanco y negro-trayectos-v3.svg') !!}" alt="logo">
                    </a>
                </div>

                <div class="col-12 d-flex justify-content-center d-lg-none">
                    <div class="dropdown">
                        <button class="btn m-2 w-100 sombra bt-log dropdown-toggle" type="button" id="accountDropdown"
                            data-toggle="dropdown">
                            <span class="dropdown-toggle-text">Cuenta: </span>
                            {{ auth()->user()->nombre_usuario }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('cuenta') }}">Perfil</a>
                            <a class="dropdown-item" href="{{ route('salir') }}">Salir</a>
                        </div>
                    </div>
                </div>
                <div class="d-none col-lg-6 pr-lg-4 d-lg-flex justify-content-end">
                    <div class="dropdown mr-4">
                        <button class="btn m-2 w-100 sombra bt-log dropdown-toggle" type="button" id="accountDropdown"
                            data-toggle="dropdown">
                            <span class="dropdown-toggle-text">Cuenta: </span>
                            {{ auth()->user()->nombre_usuario }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('cuenta') }}">Perfil</a>
                            <a class="dropdown-item" href="{{ route('salir') }}">Salir</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Menú de navegación -->
        <nav class="row w-100 m-0 bg-dark navigation clear">
            <a href="#" class="btn-togglemenu">
                <span>☰</span><span style="display: none;">✖</span>
            </a>

            <ul class="megamenu">
                <!-- Botón de Inicio -->
                <li class="item">
                    <a class="nav-link" href="{{ route('index') }}">INICIO</a>
                </li>
                <li class="item">
                    <a href="#">ARTES <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Artes']) }}">Artes</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Música']) }}">Música</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Artes Visuales']) }}">Artes
                                        Visuales</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Teatro']) }}">Teatro</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>This decked out Aero 15 is way more laptop than you need, but it’s $1,100 off
                                    </h4>
                                    <p>Gigabyte's Aero 15 with a 4K display is deeply discounted right now, plus there's
                                        a sizable mail-in-rebate available.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_2.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_3.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <a href="#">NATURALES <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Ciencias Naturales']) }}">Ciencias
                                        Naturales</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Biología']) }}">Biología</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Química']) }}">Química</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Física']) }}">Física</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Educación Física']) }}">Educación
                                        Física</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>This decked out Aero 15 is way more laptop than you need, but it’s $1,100 off
                                    </h4>
                                    <p>Gigabyte's Aero 15 with a 4K display is deeply discounted right now, plus there's
                                        a sizable mail-in-rebate available.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <a href="#">HUMANIDADES <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Literatura']) }}">Literatura</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Historia']) }}">Historia</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Geografía']) }}">Geografía</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Filosofía']) }}">Filosofía</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>This decked out Aero 15 is way more laptop than you need, but it’s $1,100 off
                                    </h4>
                                    <p>Gigabyte's Aero 15 with a 4K display is deeply discounted right now, plus there's
                                        a sizable mail-in-rebate available.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <a href="#">IDIOMAS <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Idiomas']) }}">Todos</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Inglés']) }}">Inglés</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Francés']) }}">Francés</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Italiano']) }}">Italiano</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Alemán']) }}">Alemán</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard1.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>This decked out Aero 15 is way more laptop than you need, but it’s $1,100 off
                                    </h4>
                                    <p>Gigabyte's Aero 15 with a 4K display is deeply discounted right now, plus there's
                                        a sizable mail-in-rebate available.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard2.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard3.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <a class="nav-link"
                        href="{{ route('materia', ['nombreMateria' => 'Matemáticas']) }}">MATEMÁTICAS</a>
                </li>
                <li class="item">
                    <a href="#">TECNOLOGÍA <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Tecnología']) }}">Tecnología</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Informática']) }}">Informática</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard1.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>This decked out Aero 15 is way more laptop than you need, but it’s $1,100 off
                                    </h4>
                                    <p>Gigabyte's Aero 15 with a 4K display is deeply discounted right now, plus there's
                                        a sizable mail-in-rebate available.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard2.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/keyboard3.jpg" alt="keyboard">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <a href="{{ route('empresa') }}">SOBRE NOSOTROS</a>
                </li>
            </ul>
        </nav>




        <script>
            $(document).ready(function() {
                /* show menu */
                $('.btn-togglemenu').click(function(event) {
                    event.preventDefault();
                    $('.megamenu').animate({
                        width: "toggle"
                    });
                    $('.btn-togglemenu span').toggle();
                });
                /* reset menu */
                $(window).resize(function() {
                    var $window = $(window);

                    function checkWidth() {
                        var windowsize = $window.width();
                        if (windowsize > 480) {
                            $('.megamenu').show();
                            $('.btn-togglemenu').html('<span>☰</span><span style="display: none;">✖</span>');
                        } else {
                            $('.megamenu').hide();
                        }
                    }
                    checkWidth();
                });
                /* finally: load content submenu */
                $('.sub-item').click(function(event) {
                    event.preventDefault();
                    var id = $(this).attr('data-id');
                    $('.sub-menu-content').html(
                        '<img src="images/load.gif" style="margin:0 auto; display:block" alt="load" />');
                    $.ajax({
                        method: 'get',
                        url: 'partials/content' + id + '.html',
                        success: function(data) {
                            setTimeout(function() {
                                $('.sub-menu-content').html(data);
                            }, 200);
                        }
                    })
                })
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/script.js"></script>
</header>
