<template>
    <div class="col-11 p-2">
        <h4>Pregunta {{ indexPregunta + 1 }}:</h4>
        <!-- {{ indexPregunta = indexPregunta }} -->
        <label class="p-2 px-4 font-weight-bold">{{ pregunta.nombre_pregunta }}</label>
        <fieldset>
            <div v-for="(respuesta, indexRespuesta) in pregunta.datos_pregunta.respuestas" :key="indexRespuesta" class="px-4">
                <input type="radio" :id="indexPregunta + ':' +  indexRespuesta" :name="indexPregunta" :value="indexRespuesta" class="mr-2" @change="opcionSeleccionada">
                <label :for="indexPregunta + ':' +  indexRespuesta">{{ respuesta }}</label>
            </div>
        </fieldset>
        <div class="d-flex justify-content-end">
            <span v-if="testobj.getNotaPregunta(indexPregunta) != null">Nota: {{ testobj.getNotaPregunta(indexPregunta) }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            console.log("createdTipo1"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedTipo1"); // Mera bandera de debug
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
        indexPregunta: Number
    });
    
    /*==============================================
                    MÉTODOS
    ===============================================*/
    const corregirPregunta = (indice, respuesta, fieldSet) => {
        console.log(props.pregunta);
        const pregunta = props.testobj.preguntas[indice];
        const anteriorRespuestaUsuario = props.testobj.respuestas[indice];

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
            props.testobj.setNotaPregunta(indice, actualPreguntasAcertadas / respuestaEnObjTest.length / props.testobj.getSize() * 10)
            // props.testobj.nota += actualPreguntasAcertadas / respuestaEnObjTest.length;
            if (actualPreguntasAcertadas == respuestaEnObjTest.length) {
                const inputs = fieldSet.querySelectorAll("input");
                /*-- Deshabilita los inputs cuando la pregunta sea acertada --*/
                inputs.forEach(element => {
                    element.setAttribute("disabled", "disabled");
                });
            }

            /*-- Guarda la respuesta --*/
            props.testobj.setRespuesta(indice, respuesta);
        } else {
            // props.testobj.nota -= anteriorPreguntasAcertadas / respuestaEnObjTest.length; // Esto es por si se usa en algun futuro
            const inputs = fieldSet.querySelectorAll("input");
            inputs.forEach(element => {
                element.setAttribute("disabled", "disabled")
            });
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
        corregirPregunta(indice, respuesta, fieldSet);

        /*-- Deshabilita los campos de la pregunta --*/
        // switch (props.testobj.modalidad) {
        //     case TestModel.TipoModalidad.PRACTICAR:
        //         break;
        
        //     case TestModel.TipoModalidad.DESAFIO:
        //         break;
        // }
    }
</script>

<style scoped>

</style>
