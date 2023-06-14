<template>
    <div class="col-11 p-2">
        <h4>Pregunta {{ indexPregunta + 1 }}:</h4>
        <!-- {{ indexPregunta = indexPregunta }} -->
        <label class="p-2 px-4 font-weight-bold">{{ pregunta.nombre_pregunta }}</label>
        <fieldset>
            <div v-for="(respuesta, indexRespuesta) in pregunta.datos_pregunta.respuestas" :key="indexRespuesta" class="px-4 my-2 d-flex flex-row align-items-center cursor pointer">
                <input type="radio" v-if="testobj.intento == null" :id="indexPregunta + ':' +  indexRespuesta" :name="indexPregunta" :value="indexRespuesta" class="mr-2 cursor pointer" @change="opcionSeleccionada">
                <label :for="indexPregunta + ':' +  indexRespuesta" class="m-0 px-2 w-100 cursor pointer" :class="[señalarRespuestaUsuario(indexPregunta, indexRespuesta)]">{{ respuesta }}</label>
            </div>
        </fieldset>
        <div>
            <span v-if="mostrarRetroalimentacion && (testobj.getDificultad() == TestModel.TipoDificultad.DIFÍCIL ? sended : true )">{{ testobj.getPregunta(indexPregunta).retroalimentacion }}</span>
        </div>
        <div class="d-flex justify-content-end">
            <span v-if="testobj.getNotaPregunta(indexPregunta) != null && (testobj.getDificultad() == TestModel.TipoDificultad.DIFÍCIL ? sended : true )">Nota: {{ testobj.getNotaPregunta(indexPregunta) }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("createdTipo1"); // Mera bandera de debug
            }
        },
        mounted() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("mountedTipo1"); // Mera bandera de debug
            }
        }
    }
</script>

<script setup>
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    // import {TestController} from "../TestController.js";

    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
        testobj: TestModel.Test,
        pregunta: Object,
        indexPregunta: Number,
        sended: Boolean
    });
    const mostrarRetroalimentacion = ref(false);

    /*==============================================
                PROPIEDADES COMPUTADAS
    ===============================================*/
    const señalarRespuestaUsuario = (indexPregunta, indexRespuesta) => {
        let clases = [];
        const respuestasPosibles = props.testobj.getPregunta(indexPregunta).datos_pregunta.respuestas;
        const respuestaActual = [respuestasPosibles[indexRespuesta]];
        let respuestaCorrecta = props.testobj.getPregunta(indexPregunta).datos_pregunta.respuestas_correctas;
        const respuestaUsuario = props.testobj.getRespuestaByQuestion(indexPregunta)

        /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
        if (!Array.isArray(respuestaCorrecta)) {
            respuestaCorrecta = [respuestaCorrecta];
        }

        /*-- Verifica si es la respuesta correcta --*/
        console.log(respuestaActual);
        console.log(respuestaCorrecta);
        console.log(respuestaUsuario);
        const esUnaRespuestaCorrecta = compareArraysWithoutOrder(respuestaActual, respuestaCorrecta).length;        
        const esLaRespuestaMarcadaPorElUsuario = respuestaUsuario != null ? compareArraysWithoutOrder(respuestaActual, respuestaUsuario).length : 0;
        console.log("Es una respuesta correcta: " + esUnaRespuestaCorrecta);
        console.log("Es la respuesta marcada por el usuario: " + esLaRespuestaMarcadaPorElUsuario);
        if (esLaRespuestaMarcadaPorElUsuario > 0) {
            clases.push("font-weight-bold");
            if (props.testobj.intento != null) {
                if (esUnaRespuestaCorrecta > 0) {
                    clases.push("text-success");
                }
            }
        } else {
            if (props.testobj.intento != null) {
                if (esUnaRespuestaCorrecta > 0) {
                    clases.push("text-danger");
                }
            }
        }

        return clases.join(" ");
    };

    /*================================================
            LÓGICA VISUALIZACION INTENTOS TESTS
    =================================================*/
    /*-- Comprueba si el usuario está visualizando un intento de test, para mostrarle la retroalimentación y la respuesta marcada --*/
    if (props.testobj.getIntento() != null) {
        mostrarRetroalimentacion.value = true;

    }
    
    /*==============================================
                    MÉTODOS
    ===============================================*/
    const corregirPregunta = (indice, respuesta, fieldSet) => {
        if (modeApp == ModeAppEnum.LOCALDEBUG) {
            console.log(props.pregunta);
        }
        const pregunta = props.testobj.preguntas[indice];
        if (modeApp == ModeAppEnum.LOCALDEBUG) {
            console.log(pregunta);
        }
        const anteriorRespuestaUsuario = props.testobj.respuestas[indice];

        let respuestaEnObjTest = pregunta.datos_pregunta.respuestas_correctas
        /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
        if (!Array.isArray(respuestaEnObjTest)) {
            respuestaEnObjTest = [respuestaEnObjTest];
        }
        // console.log(anteriorRespuestaUsuario);
        if (modeApp == ModeAppEnum.LOCALDEBUG) {
            console.log(respuestaEnObjTest);
        }
        const actualPreguntasAcertadas = compareArraysWithoutOrder(respuesta, respuestaEnObjTest).length
        if (modeApp == ModeAppEnum.LOCALDEBUG) {
            console.log(actualPreguntasAcertadas);
        }

        /*-- Suma nota (siempre que no estuviera ya contestada una pregunta) --*/
        // console.log(anteriorRespuestaUsuario);
        const anteriorPreguntasAcertadas = anteriorRespuestaUsuario != null ? compareArraysWithoutOrder(anteriorRespuestaUsuario, respuestaEnObjTest).length : 0;
        if (anteriorRespuestaUsuario == null || anteriorPreguntasAcertadas == 0) {
            props.testobj.setNotaPregunta(indice, actualPreguntasAcertadas / respuestaEnObjTest.length / props.testobj.getSize() * 10)
            // props.testobj.nota += actualPreguntasAcertadas / respuestaEnObjTest.length;
            /*-- Si el usuario ha acertado --*/
            if (actualPreguntasAcertadas == respuestaEnObjTest.length) {
                /*-- Deshabilita los inputs cuando la pregunta sea acertada, siempre que la dificultad no sea dificil --*/
                // if (props.testobj.getDificultad() != TestModel.TipoDificultad.DIFÍCIL) {
                    const inputs = fieldSet.querySelectorAll("input");
                    inputs.forEach(element => {
                        element.setAttribute("disabled", "disabled");
                    });
                // }
                
                /*-- Muestra la retroalimentación --*/
                mostrarRetroalimentacion.value = true;
            }

            /*-- Guarda la respuesta --*/
            props.testobj.setRespuesta(indice, respuesta);
        } else {
            // props.testobj.nota -= anteriorPreguntasAcertadas / respuestaEnObjTest.length; // Esto es por si se usa en algun futuro
            /*-- Deshabilita los inputs cuando la pregunta sea acertada, siempre que la dificultad no sea dificil --*/
            // if (props.testobj.getDificultad() != TestModel.TipoDificultad.DIFÍCIL) {
                const inputs = fieldSet.querySelectorAll("input");
                inputs.forEach(element => {
                    element.setAttribute("disabled", "disabled")
                });
            // }
            
            /*-- Muestra la retroalimentación --*/
            mostrarRetroalimentacion.value = true;
        }
    };

    const opcionSeleccionada = (evento) => {
        // console.log("Hola desde opcionSeleccionada");
        const input = evento.target;
        const label = input.labels[0].textContent;
        const divRespuesta = input.parentElement;
        const fieldSet = divRespuesta.parentElement
        const divPregunta = fieldSet.parentElement.parentElement; // section.row, por eso hago dos parentElement
        const padre = divPregunta.parentElement;
        const listaPreguntas = Array.from(padre.children);

        /*-- Obtiene el índice de la pregunta --*/
        const indice = listaPreguntas.indexOf(divPregunta);
        // console.log("Padre:");
        // console.log(padre);
        // console.dir(padre);
        // console.log("Div pregunta:");
        // console.log(divPregunta);
        // console.dir(divPregunta);
        // console.log("Fieldset respuestas:");
        // console.log(fieldSet);
        // console.dir(fieldSet);
        // console.log("Div respuesta:");
        // console.log(divRespuesta);
        // console.dir(divRespuesta);
        // console.log("Div input:");
        // console.log(input);
        // console.dir(input);
        // console.log("Div label:");
        // console.log(label);
        // console.dir(label);

        /*-- Almacena la respuesta en el objeto test --*/
        let respuesta = [label];
        // console.log(respuesta);
        

        /*-- Comprueba si la respuesta era correcta --*/
        if (modeApp == ModeAppEnum.LOCALDEBUG) {
            console.log(indice);
        }
        corregirPregunta(indice, respuesta, fieldSet);

        /*-- Qué hacer a continuación, según la modalidad del test... --*/
        switch (props.testobj.modalidad) {
            case TestModel.TipoModalidad.PRACTICAR:
                // No hace nada
                break;
        
            case TestModel.TipoModalidad.DESAFÍO:
                /*-- Deshabilita los campos de la pregunta --*/
                const inputs = fieldSet.querySelectorAll("input");
                /*-- Deshabilita los inputs cuando la pregunta sea acertada --*/
                inputs.forEach(element => {
                    element.setAttribute("disabled", "disabled");
                });
                /*-- Muestra la retroalimentación --*/
                mostrarRetroalimentacion.value = true;
                break;
        }
    }
</script>

<style scoped>
    .cursor.pointer {
        cursor: pointer;
    }
</style>
