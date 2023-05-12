<!-- Inluimos head de la pagina -->
@include('fragments.head')

<body>
<div class="container-fluid">

    <!-- Menu superior -->
    @include('fragments.menu')


    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-2 p-4">
                    <img style="width: inherit;" src="{!!asset ('images/musica.jpg')!!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>Musica</h2>
                    </div>
                    <div class="col-12">
                        <p>La música es una materia fascinante que permite a los estudiantes explorar y experimentar con
                            el poder del sonido y la melodía. A través del estudio de teoría musical, interpretación
                            instrumental y vocal, así como composición, los estudiantes desarrollan habilidades técnicas
                            y expresivas, y descubren nuevas formas de comunicación emocional. La música estimula la
                            creatividad, fomenta la colaboración y promueve el desarrollo personal, ofreciendo a los
                            estudiantes una experiencia enriquecedora y trascendental.</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <section class="row bg-primary m-4 ">
                    <div class="col-11 p-2">{{ $test->nombre_test }}</div>
                    <div class="col-1 p-2">
                        (10 preguntas)
                    </div>
                </section>
        @endforeach

    </main>

    {{--    incluimos footer--}}
    @include('fragments.footer')

</div>
</body>

</html>
