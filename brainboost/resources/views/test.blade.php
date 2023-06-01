<!-- Hereda la plantilla general -->
@extends('plantillas.base', ['enableScriptTest' => true])

<!-- Página de test -->
@section('main')
    <main class="row">
        {{-- Solo usar con fines de testing --}}
            {{-- @isset($test)
                <section class="row bg-primary m-4">
                    <div class="col-12 m-2">

                        @dump($test)

                    </div>
                </section>
            @endisset --}}
        <div id="appVue" class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-12 m-2 d-flex justify-content-between align-items-center">
                    <h3>TEST - {{ $test->nombre_test }}</h3>
                    <h5>Tiempo</h5>
                    <h5>@{{testObj.getNota() ? "Nota: " + testObj.getNota() : ""}}</h5>
                </div>
            </section>

            <section :class="['row', 'bg-primary', 'm-4']">
                <div class="col-11 p-2">
                    <p>Elige la dificultad:</p>
                    <p>Empezar test</p>
                </div>
            </section>

            <div id="bloque-preguntas" :class="['row', 'm-4', 'redondeado']">
                <div :class="['col-12']">
                    <section v-for="(pregunta, indexPregunta) in preguntasRandomOrder" :key="indexPregunta" id="logicaTest" class="d-none" :class="['d-block', 'row', 'bg-primary', 'my-4']">
                        <div v-if="pregunta.tipo_pregunta == tiposPregunta.MULTIPLE_RESPONSE" class="col-11 p-2">
                            <h4>
                                Pregunta @{{ indexPregunta + 1 }}:
                            </h4>
                            {{-- @{{ indexPregunta = indexPregunta }} --}}
                            <label class="p-2 px-4 font-weight-bold">@{{ pregunta.nombre_pregunta }}</label>
                            <div v-for="(respuesta, indexRespuesta) in pregunta.datos_pregunta.respuestas" :key="indexRespuesta" class="px-4">
                                <input type="radio" :id="indexPregunta + ':' +  indexRespuesta" :name="indexPregunta" :value="indexRespuesta" class="mr-2" @change="opcionSeleccionada">
                                <label :for="indexPregunta + ':' +  indexRespuesta">@{{ respuesta }}</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
