<template>
    <section v-for="(pregunta, indexPregunta) in preguntasRandomOrder" :key="indexPregunta" class="pregunta" :class="['d-block', 'row', 'bg-primary', 'my-4']">
        <preguntatipo1 v-if="pregunta.tipo_pregunta == TestModel.TipoPregunta.MULTIPLE_RESPONSE" :testobj="props.testobj" :pregunta="pregunta" :indexPregunta="indexPregunta"></preguntatipo1>
        <!-- <PreguntaTipo2></PreguntaTipo2>
        <PreguntaTipo3></PreguntaTipo3>
        <PreguntaTipo4></PreguntaTipo4>
        <PreguntaTipo5></PreguntaTipo5> -->
    </section>
    <div class="text-right">
        <button class="btn btn-light">Enviar test</button>
    </div>
</template>

<script setup>
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    import {TestController} from "../TestController.js";


    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
        testobj: TestModel.Test,
        testctrl: TestController
    });
    
    // const testObj = ref(new TestModel.Test());
    // const testCtrl = ref(new TestController(props.testobj));

    /*==============================================
                PROPIEDADES COMPUTADAS
    ===============================================*/
    const preguntasRandomOrder = computed(() => {
        // console.log("Hola desde preguntasRandomOrder computed");
        const devolucion = props.testobj.preguntas.sort(() => 0.5 - Random.randomFloat());

        
            devolucion.forEach(element => {
                switch (element.tipo_pregunta) {
                    case TestModel.TipoPregunta.MULTIPLE_RESPONSE: // Tipo 1
                    case TestModel.TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE: // Tipo 2
                        element.datos_pregunta.respuestas.sort(() => 0.5 - Random.randomFloat());
                        break;
                    case TestModel.TipoPregunta.UNIQUE_RESPONSE: // Tipo 3
                        break;
                    case TestModel.TipoPregunta.FILL_IN_GAPS: // Tipo 4
                        if (props.testobj.getDificultad() == TestModel.TipoDificultad.DIFICIL) {

                        }
                        break;
                    case TestModel.TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
                        break;
                    case TestModel.TipoPregunta.FILL_TABLE: // Tipo 6
                        break;
                }
            });

        return devolucion;
    });

    /*==============================================
                    MÉTODOS
    ===============================================*/
    
</script>

<script>
    import PreguntaTipo1 from "./tipo1.js.vue"
    export default {
        components: {
            "preguntatipo1": PreguntaTipo1
        },
        created() {
            console.log("createdMain"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedMain"); // Mera bandera de debug
        }
    }

</script>

<style scoped>

</style>
