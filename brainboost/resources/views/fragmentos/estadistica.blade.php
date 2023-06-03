<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">

                <section class="card-body bg-primary p-4">
                    <div class="mb-4">
                        <h1>Estadísticas</h1>
                    </div>
                    <section id="general" class="row m-2">
                        <div type="text" class="col-3">Nota media: <span class="font-weight-bold">7.35</span></div>
                        <div type="text" class="col-3">Test realizados: <span class="font-weight-bold">54</span>
                        </div>
                        <div type="text" class="col-3">Materia favorita: <span
                                class="font-weight-bold">Historia</span></div>
                        <div type="text" class="col-3">Última nota: <span class="font-weight-bold">6.75</span></div>
                    </section>
                    <div id="ultimostests" class="row m-2 p-4">
                        <h2>Últimos test realizados</h2>
                        <a href="{{ route('testhistorial') }}">Ver todos los test</a>
                        <a href="{{ route('testhistorial') }}">Ver todas las preguntas</a>
                        <div class="col-12">
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test1.html">Test 1</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test2.html">Test 2</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test3.html">Test 3</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test4.html">Test 4</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test5.html">Test 5</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test6.html">Test 6</a>
                            </div>
                        </div>
                    </div>
                    <div id="masrepetidos" class="row m-2 p-4">
                        <h2>Tests con más intentos realizados</h2>
                        <div class="col-12">
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test1.html">Test 1</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test2.html">Test 2</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test3.html">Test 3</a>
                            </div>
                            <div class="row rounded bg-light p-3 mt-1">
                                <a href="test4.html">Test 4</a>
                            </div>
                        </div>
                    </div>
                </section>

        </div>
    </div>
</div>
