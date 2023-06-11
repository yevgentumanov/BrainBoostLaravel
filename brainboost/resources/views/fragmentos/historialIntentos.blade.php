<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <div class="card">
                <div class="card-body bg-primary">
                    <h1>Historial de test realizados</h1>
                    <div class="col-12 realzado">
                        @if(isset($historialTestRealizados))
                            @foreach($historialTestRealizados as $intentoTest)
                                <a href="{{ route('test', ['idTest' => $intentoTest->id_test, 'intento' => $intentoTest->intento]) }}">
                                    <section class="row bg-primary m-4 d-flex justify-content-center">
                                        <div
                                            class="col-6 col-sm-3 col-lg-2 d-left p-2">{{ $intentoTest->test->nombre_test }}</div>
                                        <div
                                            class="col-sm-6 col-lg-8 d-none d-sm-block p-2 text-center">{{ $intentoTest->test->descripcion }}</div>
                                        <div class="col-6 col-sm-3 col-lg-2 p-2 text-right">
                                            Nota: {{ $intentoTest->nota_test }}</div>
                                    </section>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
