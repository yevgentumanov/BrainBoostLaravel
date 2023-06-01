<div class="container">
    <div class="row justify-content-left">
        <div id="divregistro" class="col-md-12">
            <div class="card ">
                <div class="card-body bg-primary">
                    <h1>Historial de preguntas respondidas de {{ auth()->user()->nombre_usuario }}</h1>
                    <section id="ultimostests" class="row p-1">
                        <div class="col-12">
                            @foreach($preguntas as $pregunta)
                                <div class="row rounded bg-light p-3 mt-1">
                                    <p>
                                    Nombre del test: {{ $pregunta['nombre_test'] }}<br>
                                    ID de pregunta: {{ $pregunta['id_pregunta'] }}<br>
                                    Nombre de la pregunta: {{ $pregunta['nombre_pregunta'] }}<br>
                                    Respuestas: {{ $pregunta['respuestas'] }}<br>
                                    Nota: {{ $pregunta['nota'] }}
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
