<template>
    <div id="bloque-preguntas" :class="['row', 'm-4', 'redondeado']">
        <div :class="['col-12']">
            <section v-for="(pregunta, indexPregunta) in preguntasRandomOrder" :key="indexPregunta" id="logicaTest" class="d-none pregunta" :class="['d-block', 'row', 'bg-primary', 'my-4']">
                <div v-if="pregunta.tipo_pregunta == tiposPregunta.MULTIPLE_RESPONSE" class="col-11 p-2">
                    <h4>Pregunta {{ indexPregunta + 1 }}:</h4>
                    <!-- {{ indexPregunta = indexPregunta }} -->
                    <label class="p-2 px-4 font-weight-bold">{{ pregunta.nombre_pregunta }}</label>
                    <div v-for="(respuesta, indexRespuesta) in pregunta.datos_pregunta.respuestas" :key="indexRespuesta" class="px-4">
                        <input type="radio" :id="indexPregunta + ':' +  indexRespuesta" :name="indexPregunta" :value="indexRespuesta" class="mr-2" change="opcionSeleccionada">
                        <label :for="indexPregunta + ':' +  indexRespuesta">{{ respuesta }}</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <span>Nota individual</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    import {TestController} from "../TestController.js";

    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const tiposPregunta = ref(TestModel.TipoPregunta); // variable reactiva
    const testObj = ref(new TestModel.Test());
    const testCtrl = ref(new TestController(testObj.value));

    /*==============================================
                PROPIEDADES COMPUTADAS
    ===============================================*/
    const preguntasRandomOrder = computed(() => {
        const devolucion = testObj.value.preguntas.sort(() => 0.5 - Random.randomFloat());

        if (testObj.value.getDificultad() == TestModel.TipoDificultad.DIFICIL) {
            devolucion.forEach(element => {
                switch (element.tipo_pregunta) {
                    case TestModel.TipoPregunta.MULTIPLE_RESPONSE: // Tipo 1
                    case TestModel.TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE: // Tipo 2
                        element.datos_pregunta.respuestas.sort(() => 0.5 - Random.randomFloat());
                        break;
                    case TestModel.TipoPregunta.UNIQUE_RESPONSE: // Tipo 3
                        break;
                    case TestModel.TipoPregunta.FILL_IN_GAPS: // Tipo 4
                        break;
                    case TestModel.TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
                        break;
                    case TestModel.TipoPregunta.FILL_TABLE: // Tipo 6
                        break;
                }
            });
        }

        return devolucion;
    });

    /*==============================================
                    MÉTODOS
    ===============================================*/
    const corregirPregunta = (indice, respuesta, divPregunta) => {
        const pregunta = testObj.value.preguntas[indice];
        const anteriorRespuestaUsuario = testObj.value.respuestas[indice];

        switch (pregunta.tipo_pregunta) {
            case TestModel.TipoPregunta.MULTIPLE_RESPONSE:
            case TestModel.TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE:
                let respuestaEnObjTest = pregunta.datos_pregunta.respuestas_correctas
                /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
                if (!Array.isArray(respuestaEnObjTest)) {
                    respuestaEnObjTest = [respuestaEnObjTest];
                }
                // console.log(anteriorRespuestaUsuario);
                console.log(respuestaEnObjTest);
                const actualPreguntasAcertadas = compareArraysWithoutOrder(respuesta, respuestaEnObjTest).length
                console.log(actualPreguntasAcertadas);

                /*-- Suma nota (siempre que no estuviera ya contestada una pregunta) --*/
                const anteriorPreguntasAcertadas = anteriorRespuestaUsuario != null ? compareArraysWithoutOrder(anteriorRespuestaUsuario, respuestaEnObjTest).length : 0;
                if (anteriorRespuestaUsuario == null || anteriorPreguntasAcertadas == 0) {
                    testObj.value.nota += actualPreguntasAcertadas / respuestaEnObjTest.length;
                    if (actualPreguntasAcertadas == respuestaEnObjTest.length) {
                        const inputs = divPregunta.querySelectorAll("input");
                        /*-- Deshabilita los inputs cuando la pregunta sea acertada --*/
                        inputs.forEach(element => {
                            element.setAttribute("disabled", "disabled");
                        });
                    }

                    /*-- Guarda la respuesta --*/
                    testObj.value.setRespuesta(indice, respuesta);
                } else {
                    // testObj.value.nota -= anteriorPreguntasAcertadas / respuestaEnObjTest.length; // Esto es por si se usa en algun futuro
                    const inputs = divPregunta.querySelectorAll("input");
                    inputs.forEach(element => {
                        element.setAttribute("disabled", "disabled")
                    });
                }
                break;
            case TestModel.TipoPregunta.UNIQUE_RESPONSE:
                
            case TestModel.TipoPregunta.FILL_IN_GAPS: // Tipo 4
            case TestModel.TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
            case TestModel.TipoPregunta.FILL_TABLE: // Tipo 5
        }
    };

    const opcionSeleccionada = (evento) => {
        const input = evento.target;
        const label = input.labels[0].textContent;
        const divRespuesta = input.parentElement;
        const divPregunta = divRespuesta.parentElement.parentElement; // section.row, por eso hago dos parentElement
        const padre = divPregunta.parentElement;
        const listaPreguntas = Array.from(padre.children);

        /*-- Obtiene el índice de la pregunta --*/
        const indice = listaPreguntas.indexOf(divPregunta);
        // console.log(padre);
        // console.dir(padre);
        // console.log(divPregunta);
        // console.dir(divPregunta);
        // console.log(divRespuesta);
        // console.dir(divRespuesta);
        // console.log(input);
        // console.dir(input);
        // console.log(label);
        // console.dir(label);

        /*-- Almacena la respuesta en el objeto test --*/
        let respuesta = [label];
        // console.log(respuesta);
        

        /*-- Comprueba si la respuesta era correcta --*/
        corregirPregunta(indice, respuesta, divPregunta);

        /*-- Deshabilita los campos de la pregunta --*/
        switch (testObj.value.modalidad) {
            case TestModel.TipoModalidad.PRACTICAR:
                break;
        
            case TestModel.TipoModalidad.DESAFIO:
                break;
        }
    }
</script>

<script>
    export default {
        created() {
            console.log("created"); // Mera bandera de debug

            /*-- Obtiene el id de la URL desde donde se está visitando la página que ha importado Vue --*/
            const rutaDesglosada = document.location.href.split("/");
            const lastSlash = rutaDesglosada[rutaDesglosada.length - 1];
            const indiceSeparador = lastSlash.indexOf("?");
            const id = Number.parseInt(indiceSeparador != -1 ? lastSlash.substring(0, indiceSeparador) : lastSlash);
            this.testObj.idTest = id;
        },
        mounted() {
            console.log("mounted"); // Mera bandera de debug
            /*-- Ordena al controlador que descargue dentro del TestModel las preguntas y la info del test --*/
            try {
                this.testCtrl.downloadInfoAboutTestByIdTest(this.testObj.getIdTest());
                this.testCtrl.downloadQuestionsByIdTest(this.testObj.getIdTest());
            } catch (error) {
                console.error(error);
            }
            
            console.log(this.testObj);
        }
    }

    /*-- Pone la nota en la cabecera de título del test --*/
    const testTitle = document.querySelector("#testTitle");
    testTitle

</script>

<style scoped>

</style>
