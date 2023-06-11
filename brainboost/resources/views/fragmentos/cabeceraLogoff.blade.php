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
</header>

<!-- Menú de navegación -->
<nav id="barranav" class="row w-100 m-0 p-0 bg-dark navigation clear stiky-top">
    <a href="#" class="btn-togglemenu">
        <span>☰</span><span style="display: none;">✖</span>
    </a>

    <ul class="megamenu m-0">
        <!-- Botón de Inicio -->
        <li class="item">
            <a class="nav-link d-flex align-items-center" href="{{ route('index') }}">INICIO</a>
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
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Artes Visuales']) }}"
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
                            <p>Descubre los secretos de las grandes construcciones y crea espacios que
                                cautiven
                                los sentidos.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia1_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El arte tridimensional: Explorando la escultura en todas sus formas</h4>
                            <p>Da vida a tus ideas con la escultura y adéntrate en un mundo de formas,
                                texturas
                                y expresiones artísticas.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia1_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El lienzo como medio de expresión: Explorando la pintura y sus técnicas</h4>
                            <p>Sumérgete en el mundo del color, la composición y la creatividad a través de
                                la
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
                            <h4>Explora la riqueza musical de décadas pasadas: una mirada al pasado</h4>
                            <p>Sumérgete en la nostalgia y revive los éxitos musicales de décadas anteriores. Explora
                                los estilos, artistas y momentos emblemáticos que definieron la música de esos tiempos.
                            </p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia2_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubre los sonidos contemporáneos: sumérgete en la música actual</h4>
                            <p>Adéntrate en los ritmos y melodías de la música actual. Descubre los géneros y artistas
                                más influyentes de la escena musical actual, desde el pop y el rock hasta el hip-hop y
                                la electrónica.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia2_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Viaja a través de los siglos: adéntrate en la majestuosidad de la música clásica</h4>
                            <p>Embárcate en un viaje sonoro a través de los siglos con la música clásica. Explora las
                                obras maestras de compositores legendarios y sumérgete en la belleza y la profundidad de
                                este género atemporal.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m3" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia3_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora el lenguaje visual del cine: una experiencia cinematográfica única</h4>
                            <p>Sumérgete en el fascinante mundo del cine y estudia su lenguaje visual. Descubre cómo los
                                directores utilizan la composición, la iluminación y otros elementos visuales para
                                contar historias y transmitir emociones de manera impactante.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia3_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora la magia de las series: Estudio y análisis de las narrativas visuales</h4>
                            <p>Las series televisivas han revolucionado el panorama audiovisual, brindando una
                                plataforma para explorar narrativas complejas y estilos visuales únicos. Explora cómo el
                                arte visual en las series influye en la forma en que percibimos y nos conectamos con las
                                historias.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia3_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Del guion a la pantalla: el proceso creativo en la producción visual televisiva</h4>
                            <p>Adéntrate en el proceso creativo detrás de la producción visual televisiva. Desde el
                                desarrollo del guion hasta la dirección de arte y la postproducción, descubre cómo se
                                construyen las imágenes visuales que vemos en la pantalla.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m4" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia4_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubre el arte de la narración escénica: Estudio de las obras teatrales</h4>
                            <p>Sumérgete en el mundo del teatro narrativo y descubre cómo las obras escénicas cautivan
                                al público a través de historias intrigantes, personajes profundos y una narrativa
                                envolvente que te transporta a diferentes épocas y lugares.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia4_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora el encanto del teatro musical: Estudio de las producciones escénicas llenas de
                                música y baile</h4>
                            <p>Vive la emoción del teatro musical y explora cómo la combinación de música, baile y
                                actuación crea espectáculos inolvidables. Descubre los aspectos técnicos y artísticos
                                que hacen que los musicales sean un género único en el mundo del teatro.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia4_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El poder de la palabra en solitario: Estudio de los monólogos teatrales y su impacto
                                emocional</h4>
                            <p>Explora el poder de la palabra y la interpretación en los monólogos teatrales. Estudia la
                                técnica y el arte de presentar historias y emociones en solitario, llevando al público a
                                un viaje íntimo y profundo a través de la actuación teatral.</p>
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
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Biología']) }}"
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
                            <h4>Explora el fascinante mundo del clima: Estudio de los fenómenos atmosféricos y su
                                impacto en nuestro entorno</h4>
                            <p>Sumérgete en el estudio del clima y aprende sobre los patrones meteorológicos, los
                                cambios climáticos y su influencia en nuestra vida cotidiana. Comprende cómo el clima
                                moldea nuestro entorno y la importancia de la sostenibilidad para un futuro más
                                resiliente.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia5_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubre la biodiversidad de la fauna y flora: Estudio de las especies y ecosistemas que
                                conforman nuestro planeta</h4>
                            <p>Explora la diversidad de la fauna y flora en nuestro planeta. Estudia las diferentes
                                especies animales y vegetales, los ecosistemas en los que habitan y los desafíos que
                                enfrentan. Aprende sobre la conservación y el papel crucial que desempeñan en el
                                equilibrio de la naturaleza.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia5_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Viaja más allá de las estrellas: Estudio del espacio y la astronomía en busca de los
                                secretos del universo</h4>
                            <p>Adéntrate en el infinito universo y estudia el fascinante mundo del espacio. Explora los
                                planetas, las estrellas, las galaxias y los misterios que encierran. Aprende sobre la
                                astronomía y las tecnologías utilizadas para explorar y comprender el vasto cosmos.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m6" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia6_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El fascinante mundo del ser humano: Estudio de la biología humana y la complejidad del
                                cuerpo humano</h4>
                            <p>Sumérgete en el estudio de la biología humana y desvela los misterios del cuerpo humano.
                                Explora los sistemas orgánicos, la genética, el funcionamiento de nuestras células y
                                cómo influyen los factores ambientales en nuestra salud y bienestar.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia6_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando el mundo microscópico: Estudio de los microorganismos y su impacto en la
                                salud y el medio ambiente</h4>
                            <p>Adéntrate en el mundo microscópico y descubre la asombrosa diversidad de los
                                microorganismos. Estudia bacterias, virus, hongos y otros organismos diminutos,
                                comprendiendo su papel en la salud, la enfermedad y la importancia de la microbiota en
                                nuestro organismo.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia6_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubriendo los secretos de la Tierra: Estudio de la geología terrestre y la formación
                                de nuestro planeta</h4>
                            <p>Explora la geología terrestre y desentraña los procesos que han dado forma a nuestro
                                planeta a lo largo de millones de años. Estudia la formación de montañas, volcanes,
                                terremotos y la dinámica de los fenómenos geológicos, comprendiendo la historia y los
                                recursos de la Tierra.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m7" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia7_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando los secretos de la materia: Estudio de los compuestos químicos y sus
                                propiedades</h4>
                            <p>Sumérgete en el estudio de los compuestos químicos y descubre las propiedades y
                                reacciones que los hacen únicos. Aprende sobre enlaces químicos, estructuras moleculares
                                y las aplicaciones prácticas de los compuestos en diversos campos como la industria, la
                                medicina y la tecnología.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia7_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El fascinante mundo de los elementos atómicos: Estudio de la tabla periódica y su
                                importancia en la química</h4>
                            <p>Explora la fascinante tabla periódica y adéntrate en el mundo de los elementos atómicos.
                                Comprende las propiedades y características de los elementos, su organización en grupos
                                y periodos, y su importancia en el entendimiento de las reacciones químicas y la
                                formación de compuestos.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia7_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Aprendiendo a través de la experimentación: Pruebas experimentales y análisis químico en
                                el laboratorio</h4>
                            <p>Experimenta en el laboratorio y desarrolla habilidades prácticas a través de pruebas
                                químicas. Realiza análisis cualitativos y cuantitativos, aprende técnicas de medición y
                                observa los efectos de reacciones químicas en tiempo real. Descubre cómo la
                                experimentación impulsa la innovación y el avance científico en el campo de la química.
                            </p>
                        </div>
                    </div>
                </div>
                <div id="sm-m8" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia8_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubriendo las leyes que rigen el universo: Estudio de las leyes físicas y su
                                aplicación en el mundo real</h4>
                            <p>Sumérgete en el fascinante mundo de las leyes físicas y comprende cómo funcionan y se
                                aplican en nuestro entorno. Explora conceptos como la gravedad, el movimiento, las
                                fuerzas y el equilibrio, y aprende a utilizar las leyes físicas para resolver problemas
                                del mundo real y mejorar nuestra tecnología.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia8_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando el mundo cuántico: Estudio de la física a nivel subatómico y las teorías
                                cuánticas</h4>
                            <p>Adéntrate en el intrigante mundo cuántico y descubre una realidad completamente
                                diferente. Explora los principios de la física cuántica, como la dualidad
                                onda-partícula, los estados cuánticos y la superposición, y entiende cómo estos
                                conceptos revolucionaron nuestra comprensión de la materia y la energía.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia8_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>De la electricidad al magnetismo: Estudio de los fenómenos eléctricos y magnéticos y su
                                relación en la física</h4>
                            <p>Explora la electricidad y el magnetismo, dos fuerzas fundamentales en nuestra vida
                                cotidiana. Aprende sobre los conceptos de carga eléctrica, corriente, campos
                                electromagnéticos y cómo se relacionan. Descubre las aplicaciones prácticas de la
                                electricidad y el magnetismo en tecnología, generación de energía y comunicaciones.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m9" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia9_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Desarrollo integral a través de la educación física: Fomentando el bienestar en los
                                niños</h4>
                            <p>La educación física es esencial en la etapa de crecimiento de los niños. A través de
                                actividades lúdicas y deportivas, promovemos su desarrollo motor, cognitivo y social,
                                inculcando hábitos de vida saludables y fomentando su bienestar físico y emocional.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia9_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Potencia tu rendimiento: Estudio del deporte y su impacto en el cuerpo y la mente</h4>
                            <p>El deporte no solo se trata de competir, sino también de adquirir habilidades físicas,
                                mejorar la resistencia, fortalecer la concentración y promover los valores del trabajo
                                en equipo. Nuestro programa de estudio del deporte ofrece una amplia gama de disciplinas
                                deportivas para que los participantes puedan descubrir sus pasiones y alcanzar su máximo
                                potencial.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia9_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Nutrición deportiva: Alimentación adecuada para optimizar el desempeño físico</h4>
                            <p>La nutrición desempeña un papel crucial en el rendimiento deportivo. Nuestro enfoque en
                                la nutrición deportiva proporciona a los participantes el conocimiento y las
                                herramientas necesarias para alimentarse de manera equilibrada y adecuada, optimizando
                                así su rendimiento físico, acelerando la recuperación y previniendo lesiones.</p>
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
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Literatura']) }}"
                                id="m17">Literatura</a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Historia']) }}"
                                id="m12">Historia</a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Geografía']) }}"
                                id="m11">Geografía</a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Filosofía']) }}"
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
                            <h4>Explorando los géneros literarios: Descubre la diversidad de la literatura</h4>
                            <p>Sumérgete en un viaje literario a través de los diferentes géneros: desde la fantasía y
                                la ciencia ficción hasta el romance y el misterio. Nuestro programa de estudio de los
                                géneros literarios te llevará a explorar las diversas formas de expresión y narrativa,
                                ampliando tus horizontes y despertando tu imaginación.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia17_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El poder de la lectura: Conecta con el conocimiento a través de los libros</h4>
                            <p>La lectura es una poderosa herramienta para adquirir conocimiento y enriquecer nuestro
                                mundo interior. A través de nuestro enfoque en la lectura, te invitamos a sumergirte en
                                historias fascinantes, descubrir diferentes perspectivas y cultivar el hábito de la
                                lectura, que te acompañará a lo largo de tu vida, abriendo puertas a nuevos horizontes.
                            </p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia17_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Encuentro con los autores: Descubre el mundo de la literatura de la mano de sus
                                creadores</h4>
                            <p>¿Alguna vez has deseado conocer a tus autores favoritos? En nuestro programa de encuentro
                                con los autores, tendrás la oportunidad de escuchar a escritores destacados, participar
                                en sesiones de preguntas y respuestas y sumergirte en el mundo creativo de la
                                literatura. Descubre las historias detrás de las historias y profundiza en el proceso de
                                creación literaria.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m12" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia12_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando los acontecimientos europeos: Descubre la fascinante historia del continente
                            </h4>
                            <p>Sumérgete en la rica historia de Europa y descubre los acontecimientos que han moldeado
                                el continente. Desde las grandes civilizaciones antiguas hasta las guerras y
                                revoluciones que han dado forma a la Europa moderna, nuestro programa te llevará en un
                                emocionante recorrido por los momentos clave de la historia europea.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia12_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Sumérgete en la historia bélica: Comprende los conflictos que marcaron el mundo</h4>
                            <p>La historia bélica ha dejado una profunda huella en el mundo. En nuestro programa de
                                estudio, explorarás los conflictos militares más significativos, analizando estrategias,
                                líderes destacados y consecuencias históricas. Comprenderás el impacto de la guerra en
                                la sociedad y cómo estos eventos han influido en el curso de la historia.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia12_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Viajando a través de la historia: Descubre los hechos y personajes que forjaron
                                nuestro pasado</h4>
                            <p>Desde los imperios antiguos hasta las revoluciones y los avances científicos, la historia
                                mundial abarca una amplia gama de eventos y temas fascinantes. Nuestro programa de
                                historia mundial te llevará en un viaje a través de los momentos clave que han dado
                                forma a la humanidad, desde las grandes exploraciones hasta los movimientos de
                                liberación y los logros científicos.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m11" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia11_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El mapa del poder: Geopolítica y relaciones internacionales</h4>
                            <p>Explora las complejas dinámicas políticas y las interacciones entre naciones que dan
                                forma a nuestro mundo actual. A través del estudio de la geopolítica, comprenderás cómo
                                la geografía influye en el poder, los conflictos y las alianzas a nivel global.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia11_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando la diversidad geográfica: Un viaje por las diferentes regiones del mundo</h4>
                            <p>Embárcate en un apasionante recorrido por las diferentes geografías mundiales. Desde las
                                vastas llanuras de América del Norte hasta las exuberantes selvas del Amazonas,
                                descubrirás los distintos paisajes, climas y ecosistemas que conforman nuestro planeta.
                                Aprenderás sobre las características únicas de cada región y cómo influyen en la vida
                                humana y la biodiversidad.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia11_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>La Tierra en relieve: Descubriendo los secretos del terreno</h4>
                            <p>Adéntrate en los fascinantes paisajes terrestres y descubre cómo se forman montañas,
                                valles, ríos y otros elementos geográficos. Aprenderás sobre los procesos geológicos que
                                han dado forma a nuestro planeta y comprenderás la importancia del relieve en la
                                configuración de los ecosistemas y las civilizaciones.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m10" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia10_1.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando el laberinto del pensamiento: Introducción a los pensamientos filosóficos
                            </h4>
                            <p>Sumérgete en el fascinante mundo de la filosofía y descubre los pensamientos y conceptos
                                que han influido en nuestra comprensión del mundo y de nosotros mismos. Desde las
                                reflexiones de los antiguos filósofos griegos hasta las teorías contemporáneas,
                                explorarás diversas corrientes filosóficas y cómo han moldeado nuestra visión del
                                conocimiento, la realidad y la ética.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia10_2.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Filósofos contemporáneos: Voces que desafían el status quo</h4>
                            <p>Conoce a los filósofos contemporáneos que están desafiando las ideas tradicionales y
                                proponiendo nuevas formas de entender el mundo. Explorarás las teorías de pensadores
                                influyentes en áreas como la filosofía política, la ética aplicada, la filosofía de la
                                mente y la filosofía de la ciencia. Descubrirás cómo sus ideas han impactado el
                                pensamiento contemporáneo y los debates actuales.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="{!! asset('images/materia10_3.jpg') !!}" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Grandes pensadores: Descubriendo las mentes brillantes de la historia</h4>
                            <p>Grandes pensadores: Descubriendo las mentes brillantes de la historia"
                                Descripción: Sumérgete en la mente de los grandes pensadores de la historia y explora
                                sus ideas revolucionarias. Desde los filósofos clásicos como Sócrates y Platón hasta los
                                ilustrados como Kant y Rousseau, explorarás las teorías y conceptos que han dejado una
                                huella duradera en el pensamiento humano. Descubrirás cómo estas mentes brillantes han
                                influido en la filosofía y en nuestra forma de comprender el mundo.</p>
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
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Italiano']) }}"
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
                            <h4>El poder de los idiomas: Construyendo puentes en una sociedad diversa</h4>
                            <p>Los idiomas no solo nos permiten comunicarnos, sino que también desempeñan un papel
                                crucial en la construcción de puentes entre personas de diferentes orígenes y en la
                                promoción de la diversidad social. Aprende sobre cómo el aprendizaje de nuevos idiomas
                                puede fomentar la inclusión, el entendimiento y la colaboración en una sociedad cada vez
                                más interconectada. Descubre cómo los idiomas pueden romper barreras y fortalecer
                                nuestras relaciones interculturales, promoviendo así una sociedad más inclusiva y
                                enriquecedora.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia21_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubriendo la diversidad lingüística: Explorando idiomas del mundo</h4>
                            <p>Sumérgete en un viaje fascinante a través de la diversidad lingüística de nuestro
                                planeta. Explorarás diferentes idiomas, desde los más hablados hasta los menos
                                conocidos, y descubrirás cómo cada uno refleja la riqueza cultural y la historia de sus
                                hablantes. Aprenderás sobre las similitudes y diferencias entre los idiomas, y cómo el
                                estudio de la diversidad lingüística nos ayuda a comprender y apreciar mejor nuestra
                                propia lengua y las de los demás.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia21_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando la diversidad cultural a través de los idiomas</h4>
                            <p>Los idiomas son portadores de cultura, y a través de su estudio podemos sumergirnos en la
                                diversidad cultural de diferentes comunidades alrededor del mundo. Descubre cómo los
                                idiomas influyen en las formas de pensar, en las tradiciones, en la literatura y en las
                                costumbres de diferentes culturas. Explorarás cómo la comprensión de los idiomas nos
                                permite conectarnos con personas de diferentes orígenes y abrir nuestras mentes a nuevas
                                perspectivas y experiencias.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m14" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia14_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Dominando el idioma inglés: Explorando una lengua global</h4>
                            <p>Sumérgete en el apasionante mundo del idioma inglés y descubre por qué es considerado una
                                lengua global. Aprende sobre su origen, evolución y expansión a lo largo de la historia,
                                y cómo se ha convertido en una herramienta esencial en los ámbitos académico,
                                profesional y cultural. Explora las peculiaridades del inglés, sus reglas gramaticales y
                                su amplio vocabulario, y adquiere las habilidades necesarias para comunicarte con
                                confianza en este idioma que conecta a personas de todo el mundo.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia14_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explorando el inglés a través de su país de origen: Descubre el Reino Unido</h4>
                            <p>Sumérgete en la rica historia y cultura del Reino Unido mientras exploras el idioma
                                inglés. Conoce los icónicos monumentos y paisajes británicos, desde el Big Ben hasta
                                Stonehenge, y descubre la importancia de la literatura y el teatro ingleses, con autores
                                como Shakespeare y obras como Romeo y Julieta. Aprende sobre las tradiciones y
                                festividades británicas, como el té de la tarde y el famoso Changing of the Guard en el
                                Palacio de Buckingham. A medida que te sumerjas en la cultura británica, desarrollarás
                                una comprensión más profunda del idioma inglés.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia14_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El poder de la comunicación en inglés: Abriendo puertas a oportunidades internacionales
                            </h4>
                            <p>El inglés es el idioma internacional de los negocios, la tecnología y las relaciones
                                internacionales. Aprender a comunicarte efectivamente en inglés te abrirá un mundo de
                                oportunidades profesionales y académicas. Descubre cómo el dominio del inglés te
                                permitirá acceder a empleos internacionales, estudiar en prestigiosas universidades de
                                habla inglesa y establecer conexiones con personas de diferentes culturas y países. A
                                medida que desarrolles tus habilidades en el idioma, estarás preparado para enfrentar
                                los desafíos y aprovechar las ventajas de un mundo globalizado.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m15" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia15_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubre la belleza del francés: Explorando una lengua romántica</h4>
                            <p>Sumérgete en la elegancia y la musicalidad del idioma francés. Aprende sobre su historia
                                y su influencia en el arte, la literatura y la moda. Descubre las reglas gramaticales y
                                la pronunciación característica del francés, y adquiere las habilidades necesarias para
                                comunicarte con fluidez en este idioma lleno de encanto. Explora la cultura francesa,
                                desde sus famosos monumentos, como la Torre Eiffel, hasta sus deliciosas especialidades
                                culinarias, como los croissants y el queso. Aprende francés y déjate seducir por la
                                magia de esta lengua romántica.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia15_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Viaje al corazón de Francia: Explorando la cultura francófona</h4>
                            <p>Sumérgete en la rica cultura del país francófono mientras aprendes francés. Descubre la
                                historia de Francia, desde la época de los reyes hasta la Revolución Francesa, y explora
                                sus ciudades icónicas, como París y Niza. Aprende sobre la literatura francesa y sus
                                grandes autores, como Victor Hugo y Marcel Proust. Sumérgete en la gastronomía francesa
                                y descubre los secretos de la cocina francesa, desde los deliciosos quesos hasta los
                                exquisitos vinos. Aprender francés te abrirá las puertas a una cultura fascinante llena
                                de arte, historia y sofisticación.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia15_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>El francés en el mundo profesional: Un idioma de oportunidades internacionales</h4>
                            <p>El francés es uno de los idiomas más hablados en el mundo y tiene una gran influencia en
                                los negocios internacionales, el turismo y la diplomacia. Aprender francés te permitirá
                                acceder a oportunidades laborales en empresas multinacionales, trabajar en la industria
                                del turismo y establecer conexiones internacionales. Además, el francés es el idioma
                                oficial de numerosas organizaciones internacionales, como la ONU y la Unión Europea. Con
                                el dominio del francés, podrás comunicarte con personas de diferentes culturas y ampliar
                                tu perspectiva global. Aprende francés y descubre un mundo lleno de posibilidades.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m13" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia13_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora la pasión italiana: Aprende el idioma y sumérgete en su cultura</h4>
                            <p>Descubre la dulzura y el encanto del idioma italiano mientras te sumerges en la rica
                                cultura de Italia. Aprende la lengua italiana y adquiere habilidades comunicativas para
                                expresarte con fluidez. Explora las tradiciones italianas, desde la cocina exquisita y
                                la moda elegante hasta las celebraciones y festividades llenas de alegría. Conoce la
                                historia y el arte de Italia, desde los antiguos romanos hasta los renombrados artistas
                                y arquitectos italianos. Aprender italiano te abrirá las puertas a un mundo de pasión,
                                romance y belleza cultural.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia13_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Viaje a la cuna del Renacimiento: Descubre la grandeza de Italia</h4>
                            <p>Sumérgete en la riqueza histórica y artística de Italia mientras aprendes italiano.
                                Explora las ciudades icónicas de Italia, como Roma, Florencia y Venecia, y maravíllate
                                con sus tesoros arquitectónicos, como el Coliseo, la Basílica de San Pedro y el Palacio
                                Ducal. Descubre la rica tradición literaria italiana, desde los sonetos de Dante
                                Alighieri hasta las obras de Umberto Eco. Aprende sobre la música italiana, desde la
                                ópera hasta las melodías populares. Aprender italiano te permitirá sumergirte en el
                                legado cultural de Italia y apreciar su belleza en toda su grandeza.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia13_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Deléitate con los sabores de Italia: Explora la gastronomía italiana y aprende el idioma
                            </h4>
                            <p>Sumérgete en el apasionante mundo culinario de Italia mientras aprendes el idioma
                                italiano. Descubre la rica tradición gastronómica italiana, desde la pasta fresca y las
                                pizzas auténticas hasta los exquisitos postres como el tiramisú y el cannoli. Aprende a
                                cocinar platos tradicionales italianos y descubre los secretos de la auténtica cocina
                                italiana. Explora los ingredientes frescos y los productos locales que hacen de la
                                gastronomía italiana una de las más apreciadas en el mundo. Aprender italiano te
                                permitirá sumergirte aún más en la cultura culinaria italiana, comunicarte con chefs y
                                locales, y comprender la pasión que impregna cada plato italiano. ¡Embárcate en un viaje
                                culinario y lingüístico por Italia!</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m16" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia16_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Descubre la belleza del alemán: Aprende el idioma y sumérgete en la cultura alemana</h4>
                            <p>Explora la riqueza lingüística y cultural de Alemania a través del estudio del idioma
                                alemán. Sumérgete en la pronunciación única y la gramática fascinante mientras te
                                adentras en la rica historia y las tradiciones alemanas. Desde la arquitectura
                                impresionante hasta la música clásica, el cine y la literatura, el alemán te abrirá las
                                puertas a una cultura llena de emocionantes descubrimientos.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia16_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Saborea Alemania: Explora la gastronomía alemana mientras aprendes alemán</h4>
                            <p>Deléitate con la diversa y deliciosa gastronomía alemana mientras aprendes el idioma.
                                Descubre los sabores únicos de las salchichas alemanas, los pretzels, el sauerkraut y
                                otros platos tradicionales. Aprende a cocinar recetas auténticas alemanas y descubre los
                                secretos de la cocina regional. Aprender alemán te permitirá comunicarte con chefs y
                                locales, leer menús y disfrutar de una experiencia culinaria auténtica en Alemania.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia16_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Celebra las tradiciones alemanas: Aprende el idioma y sumérgete en las festividades
                                alemanas</h4>
                            <p>Sumérgete en las vibrantes festividades y tradiciones de Alemania mientras aprendes el
                                idioma. Descubre la famosa Oktoberfest, con sus cervezas artesanales y música
                                tradicional. Aprende sobre el carnaval alemán, las celebraciones de Navidad y otras
                                festividades llenas de color y alegría. Aprender alemán te permitirá participar
                                activamente en estas festividades, comprender las canciones y tradiciones, y conectarte
                                con la cultura y el espíritu festivo de Alemania.</p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="item">
            <a href="#">MATEMÁTICAS <span class="arrow">❮</span></a>
            <div class="block">
                <div class="sub-menu">
                    <ul>
                        <li>
                            <a class="nav-link" href="{{ route('materia', ['nombreMateria' => 'Matemáticas']) }}"
                                id="m18">MATEMÁTICAS</a>
                        </li>
                    </ul>
                </div>
                <div id="sm-m18" class="sub-menu-content">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia18_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora los avances modernos en matemáticas: Descubre las fronteras del conocimiento
                            </h4>
                            <p>Adéntrate en el emocionante mundo de los avances modernos en matemáticas y descubre cómo
                                esta disciplina está revolucionando campos como la criptografía, la inteligencia
                                artificial, la teoría de grafos y más. En nuestro centro de formación, te guiaremos a
                                través de conceptos matemáticos vanguardistas y te prepararemos para enfrentar los
                                desafíos del futuro en este apasionante campo del conocimiento.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia18_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Grandes matemáticos de la historia: Un viaje a través de las mentes brillantes</h4>
                            <p>Sumérgete en la fascinante historia de las matemáticas y conoce a los grandes matemáticos
                                que han dejado huella en esta disciplina. Desde Arquímedes y Euclides hasta Euler y
                                Gauss, exploraremos sus contribuciones y descubriremos cómo sus ideas y teoremas siguen
                                siendo fundamentales en la actualidad. En nuestro centro de formación, te invitamos a
                                inspirarte en la genialidad de estos grandes pensadores y a comprender cómo han dado
                                forma a la matemática moderna.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia18_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Matemáticas aplicadas en el mundo laboral: Potencia tu carrera con habilidades
                                matemáticas</h4>
                            <p>Descubre cómo las matemáticas se aplican en el mundo laboral y cómo las habilidades
                                matemáticas pueden impulsar tu carrera en diversos campos, como la ingeniería, la
                                economía, la ciencia de datos y más. Aprende a utilizar herramientas matemáticas para
                                resolver problemas complejos, tomar decisiones informadas y encontrar soluciones
                                innovadoras. En nuestro centro de formación, te brindaremos las habilidades y el
                                conocimiento matemático necesarios para destacarte en el mercado laboral actual y
                                futuro.</p>
                        </div>
                    </div>
                </div>

                {{-- /*********************************************************/ --}}
        </li>
        <li class="item">
            <a href="#">TECNOLOGÍA <span class="arrow">❮</span></a>
            <div class="block">
                <div class="sub-menu">
                    <ul>
                        <li>
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Tecnología']) }}"
                                id="m19">Tecnología</a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{ route('materia', ['nombreMateria' => 'Informática']) }}"
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
                            <h4>Explora los avances tecnológicos: Sumérgete en el fascinante mundo de la tecnología</h4>
                            <p>Descubre cómo los avances tecnológicos están dando forma a nuestro presente y futuro.
                                Aprende sobre inteligencia artificial, internet de las cosas, realidad virtual, big data
                                y otras tecnologías disruptivas que están transformando industrias y cambiando la forma
                                en que vivimos y trabajamos. En nuestro centro de formación, te proporcionaremos las
                                habilidades y el conocimiento necesarios para mantenerte actualizado en este emocionante
                                campo.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia19_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Adéntrate en la robótica: Aprende a programar y construir tus propios robots</h4>
                            <p>Descubre el emocionante mundo de la robótica y desarrolla habilidades en programación y
                                construcción de robots. Desde robots industriales hasta drones y asistentes personales,
                                la robótica está revolucionando diversos sectores. En nuestro centro de formación, te
                                brindaremos las herramientas y el conocimiento para que puedas diseñar, programar y
                                poner en marcha tus propios robots, y explorar las infinitas posibilidades que la
                                robótica ofrece.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia19_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Entra en la industria tecnológica: Prepara tu carrera en el sector tecnológico</h4>
                            <p>Conviértete en un profesional altamente demandado en la industria tecnológica. Aprende
                                sobre las últimas tendencias y habilidades necesarias para destacar en campos como el
                                desarrollo de software, la ciberseguridad, la analítica de datos y la gestión de
                                proyectos tecnológicos. Nuestro centro de formación te brindará los conocimientos y
                                recursos necesarios para que puedas ingresar y crecer en el emocionante mundo de la
                                tecnología, con amplias oportunidades laborales y un futuro prometedor.</p>
                        </div>
                    </div>
                </div>
                <div id="sm-m20" class="sub-menu-content d-none">
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia20_1.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Explora los avances tecnológicos en informática: Descubre el futuro de la tecnología
                            </h4>
                            <p>Sumérgete en el mundo de los avances tecnológicos en informática y descubre cómo la
                                inteligencia artificial, el aprendizaje automático y la computación en la nube están
                                transformando la forma en que vivimos y trabajamos. En nuestro centro de formación, te
                                brindaremos las habilidades y el conocimiento necesarios para mantenerte al día con las
                                últimas tendencias y prepararte para una carrera emocionante en el campo de la
                                informática.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia20_2.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Desarrolla aplicaciones de usuario: Aprende a crear experiencias interactivas y
                                atractivas</h4>
                            <p>Descubre cómo crear aplicaciones de usuario que sean intuitivas, funcionales y
                                atractivas. Aprende a diseñar interfaces de usuario atractivas, a desarrollar
                                aplicaciones web y móviles interactivas y a utilizar las últimas herramientas y
                                tecnologías de desarrollo de software. En nuestro centro de formación, te
                                proporcionaremos los conocimientos y las habilidades necesarias para convertirte en un
                                desarrollador de aplicaciones de usuario competente y exitoso.</p>
                        </div>
                    </div>
                    <div class="notice">
                        <div class="notice-image">
                            <img src="images/materia20_3.jpg" alt="materia">
                        </div>
                        <div class="notice-detail">
                            <h4>Informática en las empresas: Potencia el éxito empresarial con la tecnología</h4>
                            <p>Descubre cómo la informática impulsa el éxito empresarial y cómo las empresas utilizan la
                                tecnología para mejorar sus operaciones, aumentar la eficiencia y alcanzar sus objetivos
                                estratégicos. Aprende sobre sistemas de gestión empresarial, análisis de datos,
                                seguridad informática y otras áreas clave de la informática empresarial. En nuestro
                                centro de formación, te prepararemos para desempeñarte en roles relacionados con la
                                informática empresarial y te brindaremos las habilidades necesarias para aportar valor a
                                las organizaciones mediante el uso estratégico de la tecnología.</p>
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
