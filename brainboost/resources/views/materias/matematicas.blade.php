<!-- Incluimos head de la pagina -->
@include('fragments.head')

<body>
<div class="container-fluid">

    <!-- Menu superior -->
    @include('fragments.menu')

    <main class="row">
        <div class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-2 p-4">
                    <img style="width: inherit;" src="{!!asset ('images/matematica.jpg')!!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>Matematicas</h2>
                    </div>
                    <div class="col-12">
                        <p>Las Matemáticas es una materia fundamental que se basa en la lógica y el razonamiento para
                            resolver problemas y comprender el mundo que nos rodea. A través del estudio de conceptos
                            como el álgebra, la geometría y el cálculo, los estudiantes desarrollan habilidades
                            analíticas y de pensamiento crítico. Las Matemáticas fomentan el pensamiento abstracto, la
                            resolución de problemas y la toma de decisiones informadas, proporcionando a los estudiantes
                            una base sólida para el desarrollo académico y profesional en diversas áreas.</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <section class="row bg-primary m-4">
                    <div class="col-11 p-2">{{ $test->nombre_test }}</div>
                    <div class="col-1 p-2">(10 preguntas)</div>
                </section>
        @endforeach

    </main>

    {{--    incluimos footer--}}
    @include('fragments.footer')

</div>
</body>

</html>
