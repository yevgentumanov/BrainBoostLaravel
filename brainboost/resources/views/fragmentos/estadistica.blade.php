<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">

            <section class="card-body bg-primary p-4">
                <div class="mb-4">
                    <h1>Estadísticas</h1>
                </div>
                <section id="general" class="row m-2 glow-back">
                    <div type="text" class="col-3">Nota media: <span class="font-weight-bold">{{$notaMedia}}</span></div>
                    <div type="text" class="col-3">Test realizados: <span class="font-weight-bold">{{$numeroTestRealizados}}</span>
                    </div>
                    <div type="text" class="col-3">Materia favorita: <span
                            class="font-weight-bold">{{$nombreMateria}}</span></div>
                    <div type="text" class="col-3">Última nota: <span class="font-weight-bold">{{$ultimaNota}}</span></div>
                </section>
                <div id="ultimostests" class="row m-2 p-4">
                    <h2>Últimos test realizados</h2>
                    <div class="col-12">
                        @foreach($ultimosTestRealizados as $ultimoTestRealizado)
                            <a href="{{ route('test', ['idTest' => $ultimoTestRealizado->id_test, 'intento' => $ultimoTestRealizado->intento]) }}">
                                <section class="row bg-primary m-4 d-flex justify-content-center">
                                    <div
                                        class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $ultimoTestRealizado->test->nombre_test }}</div>
                                    <div
                                        class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $ultimoTestRealizado->test->descripcion }}</div>
                                    <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">
                                        Intento: {{ $ultimoTestRealizado->intento }}</div>
                                    <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">Nota: {{ $ultimoTestRealizado->nota_test }}</div>
                                </section>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-12 text-right mt-2">
                        <a href="{{ route('testhistorial') }}" class="btn btn-primary">Ver todos los test realizados</a>
                    </div>
                </div>
                <div id="masrepetidos" class="row m-2 p-4">
                    <h2>Tests con más intentos realizados</h2>
                    <div class="col-12">
                        @foreach($popularTestResults as $popTestRes)
                            <a href="{{ route('test', ['idTest' => $ultimoTestRealizado->id_test]) }}">
                                <section class="row bg-primary m-4 d-flex justify-content-center">
                                    <div
                                        class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $popTestRes->test->nombre_test }}</div>
                                    <div
                                        class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $popTestRes->test->descripcion }}</div>
                                </section>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
