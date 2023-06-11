<template>
    <div id="eligeDificultad" :class="['row', 'm-4']">
        <section class="col-12 p-2 bg-primary text-center">
            <h5>Elige la dificultad</h5>
        </section>
        <!-- <section class="col-12 p-2 bg-primary">
            <fieldset class="d-flex justify-content-between">
                <button class="btn btn-primary" v-for="(dificultad) in TestModel.TipoDificultadInversa">
                    <label>
                        <input type="radio" name="dificultad">
                        {{ dificultad.charAt(0).toUpperCase() + dificultad.slice(1).toLowerCase() }}
                    </label>
                </button>
            </fieldset>
        </section> -->
        <div class="col-12 mt-4 d-flex justify-content-between">
            <div class="d-flex flex-column justify-content-between">
                <button class="btn btn-light btn-5" @click="testobj.modalidad = null">Volver</button>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <button class="btn btn-light btn-5" @click="facil">Fácil</button>
                <button class="btn btn-outline-light mt-2" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Fácil" 
                        :data-content="explicacionModoFacil">
                    ?
                </button>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <button class="btn btn-light btn-5" @click="dificil">Difícil</button>
                <button class="btn btn-outline-light mt-2" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Difícil" 
                        :data-content="explicacionModoDificil">
                    ?
                </button>
            </div>
        </div>
        <!-- <div class="col-12 mt-4 text-right">
            <button class="btn btn-light">Empezar test</button>
        </div> -->
    </div>
</template>

<script>
    export default {
        created() {
            console.log("createdEligeDificultad"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedEligeDificultad"); // Mera bandera de debug
            /*-- Habilita los popovers de Bootstrap (JQuery) --*/
            $(function () {
                $('[data-toggle="popover"]').popover({
                    container: '#eligeDificultad'
                })
            })
        }
    }
</script>

<script setup>
    // import { ref, computed } from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    import {TestController} from "../TestController.js";
    
    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
        testobj: TestModel.Test,
        testctrl: TestController
    });

    const explicacionModoFacil = `En la dificultad "Fácil", podrás ver tu nota (tu progreso) conforme vas respondiendo a las preguntas.` //Se introducirán "modificadores": por ejemplo, las respuestas numéricas (como fechas), se darán con un control deslizante para mayor facilidad.`;
    const explicacionModoDificil = `En la dificultad "Difícil", la nota de cada pregunta no se da instantáneamente. Recibirás tu nota al enviar el test.` //No se introducirán "modificadores": por ejemplo, las respuestas numéricas (por ejemplo, fechas), se introducirán en una caja de texto. En las respuestas de huecos, los huecos aparecerán en orden aleatorio.`;

    /*==============================================
                    MÉTODOS
    ===============================================*/
    function facil(evento) {
        // window.alert("facil");
        props.testobj.setDificultad(TestModel.TipoDificultad.FÁCIL);
    }

    function dificil(evento) {
        // window.alert("dificil");
        props.testobj.setDificultad(TestModel.TipoDificultad.DIFÍCIL);
    }
</script>

<style scoped>
    /* .btn:not(.btn-light) {
        padding: 0;
        border: 0;
    } */

    /* label {
        margin-bottom: 0;
        padding: 0.5em;
    } */
</style>