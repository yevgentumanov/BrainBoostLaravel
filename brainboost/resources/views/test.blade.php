<!-- Hereda la plantilla general -->
@extends('plantillas.base', ['enableScriptTest' => true])

<!-- Página de test -->
@section('main')
    <main class="row">
        <div id="appVue" class="col-12">
            <section class="row bg-primary m-4">
                <div class="col-12 m-2 d-flex justify-content-between align-items-center">
                    {{-- <h3>TEST - {{ $test->nombre_test }}</h3> --}}
                    <h3 class="d-none" :class='["d-block"]'>TEST - @{{ testObj.getNombreTest() }}</h3>
                    <h5 class="d-none" :class='["d-block"]' v-if="testObj.getModalidad() != null">@{{modalidadString}}</h5>
                    <h5 class="d-none" :class='["d-block"]' v-if="testObj.getDificultad() != null">@{{dificultadString}}</h5>
                    <h5 class="d-none" :class='["d-block"]' v-if="testObj.getTiempoInicio() != null">Tiempo</h5>
                    <h5 class="d-none" :class='["d-block"]'>@{{testObj.getNota() ? "Nota: " + testObj.getNota() : ""}}</h5>
                </div>
            </section>

            <div id="bloque-preguntas" class="row m-4 redondeado">
                <div class="col-12">
                    <testvue :testObj="testObj" :testCtrl="testCtrl"></testvue> <!-- No sé por qué, da igual poner :testObj que :testobj. El caso es que luego en los props del main.js.vue, hay que ponerlo con minúscula -->
                </div>
            </div>
        </div>
    </main>
@endsection
