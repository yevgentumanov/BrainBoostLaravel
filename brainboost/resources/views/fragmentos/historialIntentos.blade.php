<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <div class="card ">
                <div class="card-body bg-primary">
                    <h1>Historial de test realizados</h1>
                    <section id="ultimostests" class="row p-1">
                        <div class="col-12">
                            @foreach($tests as $test)
                                <div class="row rounded bg-light p-3 mt-1">
                                    <p>
                                    ID de usuario: {{ $test['id_usuario'] }} <br>
                                    Nombre del test: {{ $test['nombre_test'] }}<br>
                                    ID de pregunta: {{ $test['id_pregunta'] }}<br>
                                    Nombre de la pregunta: {{ $test['nombre_pregunta'] }}<br>
                                    Respuestas: {{ $test['respuestas'] }}<br>
                                    Nota: {{ $test['nota'] }}
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
