<template>
    <alerta v-if="sended == true" 
            classalert="alert-success" 
            message="El test ha sido enviado al servidor correctamente">
    </alerta>
    <section v-for="(pregunta, indexPregunta) in preguntasRandomOrder" :key="indexPregunta" class="pregunta" :class="['d-block', 'row', 'bg-primary', 'my-4']">
        <preguntatipo1 v-if="pregunta.tipo_pregunta == TestModel.TipoPregunta.MULTIPLE_RESPONSE" 
                       :testobj="props.testobj" 
                       :pregunta="pregunta" 
                       :indexPregunta="indexPregunta">
        </preguntatipo1>
        <!-- <PreguntaTipo2></PreguntaTipo2>
        <PreguntaTipo3></PreguntaTipo3>
        <PreguntaTipo4></PreguntaTipo4>
        <PreguntaTipo5></PreguntaTipo5> -->
    </section>
    <div class="text-right">
        <button class="btn btn-light" @click="sendTest">Enviar test</button>
    </div>
</template>

<script>
    import PreguntaTipo1 from "./tipo1.js.vue";
    import Alerta from "./alert.js.vue";
    export default {
        components: {
            "preguntatipo1": PreguntaTipo1,
            "alerta": Alerta
        },
        created() {
            console.log("createdDoTest"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedDoTest"); // Mera bandera de debug
        }
    }

</script>

<script setup>
    import * as TestModel from "../TestModel.js";
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import {TestController} from "../TestController.js";


    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
        alert: Object,
        testobj: TestModel.Test,
        testctrl: TestController
    });
    const sended = ref(false)
    let intervalo;
    
    /*==============================================
         Establece el tiempoInicio en TestModel
    ================================================*/
    // props.testobj.setTiempoInicio();
    // intervalo = setInterval(props.testobj.setTiempoFin, 1000);

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
    // function sumarTiempo() {

    // }

    function sendTest(e) {
        if (!sended.value) {
            clearInterval(intervalo);
            props.testctrl.sendInfoIntentoTestUsuario((response) => {
                console.log("Hasta aquí funciona el código: el servidor no ha dado error");
                // console.log(response);
                if ("datosTest" in response && "preguntasTestRealizado" in response) {
                    // window.history.back(); // Para volver a la página anterior
                    sended.value = true;
                    // const btn = document.createElement("button");
                    // btn.setAttribute
                    e.target.setAttribute("disabled", "disabled")
                    window.scrollTo({top: 0, behavior: "smooth"});
                }
            });
        }
    }
</script>

<style scoped>

</style>
