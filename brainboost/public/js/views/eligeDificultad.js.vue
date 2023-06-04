<template>
    <div :class="['row', 'm-4']">
        <section class="col-12 p-2 bg-primary">
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
            <button class="btn btn-light" @click="facil">Fácil</button>
            <button class="btn btn-light" @click="dificil">Difícil</button>
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