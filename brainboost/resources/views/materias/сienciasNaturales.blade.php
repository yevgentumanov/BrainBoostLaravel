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
                    <img style="width: inherit;" src="{!!asset ('images/cienciasNaturales.jpg')!!}" alt="test">
                </div>
                <div class="col-10 p-4">
                    <div class="col-12">
                        <h2>Ciencias Naturales</h2>
                    </div>
                    <div class="col-12">
                        <p>Las Ciencias Naturales es una materia fascinante que nos permite explorar y comprender los
                            fenómenos y procesos que ocurren en la naturaleza. A través del estudio de disciplinas como
                            la biología, la química y la física, los estudiantes adquieren conocimientos sobre la
                            estructura y funcionamiento de los seres vivos, las propiedades de la materia y las leyes
                            que rigen el universo. Las Ciencias Naturales fomentan el pensamiento científico, la
                            observación, la experimentación y el análisis crítico, brindando a los estudiantes las
                            herramientas necesarias para comprender y preservar nuestro entorno natural, así como
                            contribuir al avance de la sociedad en diversos campos científicos.</p>
                    </div>
                </div>
            </section>

            @foreach ($tests as $test)
                <section class="row bg-primary m-4 ">
                    <div class="col-11 p-2">{{ $test->nombre_test }}                    </div>
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
