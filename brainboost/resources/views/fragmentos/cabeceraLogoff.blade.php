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

            <ul class="megamenu m-0">
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
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Artes']) }}"
                                        id="m1">Artes</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Música']) }}"
                                        id="m2">Música</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Artes Visuales']) }}"
                                        id="m3">Artes Visuales</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Teatro']) }}"
                                        id="m4">Teatro</a>
                                </li>
                            </ul>
                        </div>
                        <div id="sm-m1" class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_1.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Explorando la belleza de la arquitectura: Diseño, estructuras y estilos</h4>
                                    <p>Descubre los secretos de las grandes construcciones y crea espacios que cautiven
                                        los sentidos.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El arte tridimensional: Explorando la escultura en todas sus formas</h4>
                                    <p>Da vida a tus ideas con la escultura y adéntrate en un mundo de formas, texturas
                                        y expresiones artísticas.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia1_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El lienzo como medio de expresión: Explorando la pintura y sus técnicas</h4>
                                    <p>Sumérgete en el mundo del color, la composición y la creatividad a través de la
                                        pintura, donde cada pincelada cuenta una historia.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m2" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia2_1.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Explorando la belleza de la arquitectura: Diseño, estructuras y estilos</h4>
                                    <p>Descubre los secretos de las grandes construcciones y crea espacios que cautiven
                                        los sentidos.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia2_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El arte tridimensional: Explorando la escultura en todas sus formas</h4>
                                    <p>Da vida a tus ideas con la escultura y adéntrate en un mundo de formas, texturas
                                        y expresiones artísticas.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia2_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El lienzo como medio de expresión: Explorando la pintura y sus técnicas</h4>
                                    <p>Sumérgete en el mundo del color, la composición y la creatividad a través de la
                                        pintura, donde cada pincelada cuenta una historia.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m3" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia3_1.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Explorando la belleza de la arquitectura: Diseño, estructuras y estilos</h4>
                                    <p>Descubre los secretos de las grandes construcciones y crea espacios que cautiven
                                        los sentidos.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia3_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Explorando la belleza de la arquitectura: Diseño, estructuras y estilos</h4>
                                    <p>Descubre los secretos de las grandes construcciones y crea espacios que cautiven
                                        los sentidos.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia3_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El lienzo como medio de expresión: Explorando la pintura y sus técnicas</h4>
                                    <p>Sumérgete en el mundo del color, la composición y la creatividad a través de la
                                        pintura, donde cada pincelada cuenta una historia.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m4" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia4_1.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Explorando la belleza de la arquitectura: Diseño, estructuras y estilos</h4>
                                    <p>Descubre los secretos de las grandes construcciones y crea espacios que cautiven
                                        los sentidos.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia4_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El arte tridimensional: Explorando la escultura en todas sus formas</h4>
                                    <p>Da vida a tus ideas con la escultura y adéntrate en un mundo de formas, texturas
                                        y expresiones artísticas.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia4_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>El lienzo como medio de expresión: Explorando la pintura y sus técnicas</h4>
                                    <p>Sumérgete en el mundo del color, la composición y la creatividad a través de la
                                        pintura, donde cada pincelada cuenta una historia.</p>
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
                                        href="{{ route('materia', ['nombreMateria' => 'Ciencias Naturales']) }}"
                                        id="m5">Ciencias
                                        Naturales</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Biología']) }}"
                                        id="m6">Biología</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Química']) }}"
                                        id="m7">Química</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Física']) }}"
                                        id="m8">Física</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Educación Física']) }}"
                                        id="m9">Educación
                                        Física</a>
                                </li>
                            </ul>
                        </div>
                        <div id="sm-m5" class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia5_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia5_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia5_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m6" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia6_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia6_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m7" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia7_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia7_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia7_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m8" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia8_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia8_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia8_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m9" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia9_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia9_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia9_3.jpg') !!}" alt="materia">
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
                                        href="{{ route('materia', ['nombreMateria' => 'Literatura']) }}"
                                        id="m17">Literatura</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Historia']) }}"
                                        id="m12">Historia</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Geografía']) }}"
                                        id="m11">Geografía</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Filosofía']) }}"
                                        id="m10">Filosofía</a>
                                </li>
                            </ul>
                        </div>
                        <div id="sm-m17" class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia17_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia17_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia17_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m12" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia12_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia12_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia12_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m11" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia11_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia11_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia11_3.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m10" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia10_1.jpg') !!}" alt="materia">
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
                                    <img src="{!! asset('images/materia10_2.jpg') !!}" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="{!! asset('images/materia10_3.jpg') !!}" alt="materia">
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
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Idiomas']) }}"
                                        id="m21">Todos</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Inglés']) }}"
                                        id="m14">Inglés</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Francés']) }}"
                                        id="m15">Francés</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Italiano']) }}"
                                        id="m13">Italiano</a>
                                </li>
                                <li>
                                    <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Alemán']) }}"
                                        id="m16">Alemán</a>
                                </li>
                            </ul>
                        </div>
                        <div id="sm-m21" class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia21_1.jpg" alt="materia">
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
                                    <img src="images/materia21_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia21_3.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m14" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia14_1.jpg" alt="materia">
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
                                    <img src="images/materia14_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia14_3.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m15" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia15_1.jpg" alt="materia">
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
                                    <img src="images/materia15_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia15_3.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m13" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia13_1.jpg" alt="materia">
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
                                    <img src="images/materia13_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia13_3.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m16" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia16_1.jpg" alt="materia">
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
                                    <img src="images/materia16_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia16_3.jpg" alt="materia">
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
                    <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Matemáticas']) }}"
                        id="m18">MATEMÁTICAS</a>
                </li>
                <li class="item">
                    <a href="#">TECNOLOGÍA <span class="arrow">❮</span></a>
                    <div class="block">
                        <div class="sub-menu">
                            <ul>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Tecnología']) }}"
                                        id="m19">Tecnología</a>
                                </li>
                                <li>
                                    <a class="sub-item"
                                        href="{{ route('materia', ['nombreMateria' => 'Informática']) }}"
                                        id="m20">Informática</a>
                                </li>
                            </ul>
                        </div>
                        <div id="sm-m19" class="sub-menu-content">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia19_1.jpg" alt="materia">
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
                                    <img src="images/materia19_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia19_3.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>Hacker steals over $600M in cryptocurrency, returns over half of it</h4>
                                    <p>Over $340M has been given back as a very strange digital heist story continues to
                                        develop.</p>
                                </div>
                            </div>
                        </div>
                        <div id="sm-m20" class="sub-menu-content d-none">
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia20_1.jpg" alt="materia">
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
                                    <img src="images/materia20_2.jpg" alt="materia">
                                </div>
                                <div class="notice-detail">
                                    <h4>AMD claims its largest share of the overall x86 CPU market in 14 years</h4>
                                    <p>According to Mercury Research, AMD's x86 processor share is close to its all-time
                                        high.</p>
                                </div>
                            </div>
                            <div class="notice">
                                <div class="notice-image">
                                    <img src="images/materia20_3.jpg" alt="materia">
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
                    })
                    $('.btn-togglemenu span').toggle();
                })

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
                    checkWidth()
                })
            })

            /* finally: load content submenu */
            let subItems = document.querySelectorAll('.sub-item');

            subItems.forEach(sItem => {
                sItem.addEventListener('mouseenter', function() {
                    let sigSubMenuContent = sItem.parentElement.parentElement.parentElement.nextElementSibling;

                    while (sigSubMenuContent) {
                        let smActual = 'sm-' + sItem.id

                        if (sigSubMenuContent.id == smActual) sigSubMenuContent.classList.remove('d-none')
                        else sigSubMenuContent.classList.add('d-none')

                        sigSubMenuContent = sigSubMenuContent.nextElementSibling;
                    }
                })
            })
        </script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/script.js"></script> --}}
</header>
