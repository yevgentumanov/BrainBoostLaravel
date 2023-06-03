<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <div class="card">
                <div class="card-body bg-primary">
                    <h1>Historial de test realizados</h1>
                    <section id="ultimostests" class="row p-1">
                        <div class="col-12">
                            @foreach($tests as $intentosTest)
                                <div class="row rounded bg-light p-3 mt-1">
                                    <p> Nombre test: {{ $intentosTest->test->nombre_test }} Descripcion: {{ $intentosTest->test->descripcion }}<br>
                                        Nota obtenida: {{ $intentosTest->nota_test }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
