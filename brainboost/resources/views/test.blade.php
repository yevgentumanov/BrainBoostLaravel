<!-- Hereda la plantilla general -->
@extends('plantillas.base', ['enableScriptTest' => true])

<!-- Página de test -->
@section('main')
    <main class="row w-100 m-0">
        <div id="appVue" class="col-12 p-4 cuerpo">
            <section class="row m-0 justify-content-center bg-primary seccion-mb s-materia">
                {{-- <h3>TEST - {{ $test->nombre_test }}</h3> --}}
                <div class="col-12 col-lg-3 p-2 d-flex justify-content-center align-items-center m-0">
                    <h3 class="d-none m-0" :class='["d-block"]'>TEST - @{{ testObj.getNombreTest() }}</h3>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 p-2 d-flex justify-content-center align-items-center m-0">
                    <h5 class="d-none m-0" :class='["d-block"]' v-if="testObj.getModalidad() != null">@{{modalidadString}}</h5>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 p-2 d-flex justify-content-center align-items-center m-0">
                    <h5 class="d-none m-0" :class='["d-block"]' v-if="testObj.getDificultad() != null">@{{dificultadString}}</h5>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 p-2 d-flex justify-content-center align-items-center m-0">
                    <h5 class="d-none m-0" :class='["d-block"]' v-if="testObj.getTiempoInicio() != null">@{{tiempoTranscurrido[0]}}:@{{tiempoTranscurrido[1]}}:@{{tiempoTranscurrido[2]}}</h5>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 p-2 d-flex justify-content-center align-items-center m-0">
                    <h5 class="d-none m-0" :class='["d-block"]' v-if="testObj.getDificultad() == tiposDificultad.DIFÍCIL ? testCtrl.sended || testObj.intento : true">@{{testObj.getNota() != null ? "Nota: " + testObj.getNota() : ""}}</h5>
                </div>
            </section>

            <div id="bloque-preguntas" class="row seccion-mb sombra_borde redondeado s-materia">
                <div class="col-12 seccion-mb">
                    <testvue :testObj="testObj" :testCtrl="testCtrl"></testvue> <!-- No sé por qué, da igual poner :testObj que :testobj. El caso es que luego en los props del main.js.vue, hay que ponerlo con minúscula -->
                </div>
            </div>
        </div>
    </main>
@endsection
