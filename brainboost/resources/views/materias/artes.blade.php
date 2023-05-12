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
                    <img style="width: inherit;" src="{!!asset ('images/arte.jpg')!!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>Artes</h2>
                    </div>
                    <div class="col-12">
                        <p>
                            Las Artes es una materia apasionante que permite a los estudiantes explorar y expresar su
                            creatividad a través de diversas formas artísticas como la pintura, la música, el teatro y
                            la danza. Mediante la combinación de habilidades técnicas y conceptuales, los estudiantes
                            desarrollan su sensibilidad estética y adquieren una comprensión más profunda de la cultura
                            y la historia. Esta materia fomenta la imaginación, la comunicación y el pensamiento
                            crítico, brindando a los estudiantes una experiencia enriquecedora y transformadora.</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <section class="row bg-primary m-4">
                    <div class="col-11 p-2">{{ $test->nombre_test }} {{ $test->id }}</div>
                    <div class="col-1 p-2">(10 preguntas)</div>
                </section>
        @endforeach

    </main>

    {{--    incluimos footer--}}
    @include('fragments.footer')
</div>
</body>

</html>
