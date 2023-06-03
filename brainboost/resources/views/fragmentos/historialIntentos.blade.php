<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <div class="card">
                <div class="card-body bg-primary">
                    <h1>Historial de test realizados</h1>
                    <section id="ultimostests" class="row p-1">
                        <div class="col-12">
                            @foreach($historialTestRealizados as $intentoTest)
                                <a href="{{ route('test', ['idTest' => $intentoTest->id, 'name' => $intentoTest->nombre_test,'intentotest' => $intentoTest]) }}">
                                    <section class="row bg-primary m-4 d-flex justify-content-center">
                                        <div
                                            class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $intentoTest->test->nombre_test }}</div>
                                        <div
                                            class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $intentoTest->test->descripcion }}</div>
                                        <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">
                                            Intento: {{ $intentoTest->intento }}</div>
                                        <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">Nota
                                            obtenida: {{ $intentoTest->nota_test }}</div>
                                    </section>
                                </a>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
