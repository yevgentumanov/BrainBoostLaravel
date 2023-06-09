<div>
    <div class="row w-100 m-0 justify-content-left">
        <div id="divregistro" class="col-md-12">

            <section class="card-body bg-primary p-4">
                <div class="mb-4">
                    <h1>Estadísticas</h1>
                </div>
                <section id="general" class="row m-2 glow-back">
                    @if(isset($notaMedia))
                        <div type="text" class="col-3">Nota media: <span class="font-weight-bold">{{$notaMedia}}</span>
                        </div>
                    @endif
                    @if(isset($numeroTestRealizados))
                        <div type="text" class="col-3">Test realizados: <span
                                class="font-weight-bold">{{$numeroTestRealizados}}</span></div>
                    @endif
                    @if(isset($numeroTestRealizados))
                        <div type="text" class="col-3">Materia favorita: <span
                                class="font-weight-bold">{{$nombreMateria}}</span></div>
                    @endif
                    @if(isset($ultimaNota))
                        <div type="text" class="col-3">Última nota: <span
                                class="font-weight-bold">{{$ultimaNota}}</span></div>
                    @endif
                </section>
                <div id="ultimostests" class="row m-2 p-4">
                    <h2>Últimos test realizados</h2>
                    <div class="col-12 realzado">
                        @if(isset($ultimosTestRealizados))
                            @foreach($ultimosTestRealizados as $ultimoTestRealizado)
                                @if(isset($ultimoTestRealizado->id_test) && isset($ultimoTestRealizado->intento))
                                    <a href="{{ route('test', ['idTest' => $ultimoTestRealizado->id_test, 'intento' => $ultimoTestRealizado->intento]) }}">
                                        <section class="row bg-primary mt-2 d-flex justify-content-center">
                                            <div
                                                class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $ultimoTestRealizado->test->nombre_test }}</div>
                                            <div
                                                class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $ultimoTestRealizado->test->descripcion }}</div>
                                            <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">
                                                Intento: {{ $ultimoTestRealizado->intento }}</div>
                                            <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">
                                                Nota: {{ $ultimoTestRealizado->nota_test }}</div>
                                        </section>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="col-12 text-right mt-2">
                        <a id="btn-todos" href="{{ route('testhistorial') }}" class="btn btn-5">Ver todos los test
                            realizados</a>
                    </div>
                </div>
                <div id="masrepetidos" class="row m-2 p-4">
                    <h2>Tests con más intentos realizados</h2>
                    <div class="col-12 realzado">
                        @if(isset($popularTestResults))
                            @foreach($popularTestResults as $popTestRes)
                                @if(isset($popTestRes->id_test) && isset($popTestRes->test->nombre_test) && isset(popTestRes->test->descripcion))
                                    <a href="{{ route('test', ['idTest' => $popTestRes->id_test]) }}">
                                        <section class="row bg-primary mt-2 d-flex justify-content-center">
                                            <div
                                                class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $popTestRes->test->nombre_test }}</div>
                                            <div
                                                class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $popTestRes->test->descripcion }}</div>
                                        </section>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
