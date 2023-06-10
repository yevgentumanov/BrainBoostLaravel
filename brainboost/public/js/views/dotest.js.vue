<template>
    <alerta v-if="sended == true || error == true" 
            :classalert="claseAlerta" 
            :message="mensajeAlerta">
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
    <div v-if="testobj.intento == null" class="text-right">
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
    const sended = ref(false);
    const error = ref(false);
    
    let intervalo;
    
    /*==============================================
         Establece el tiempoInicio en TestModel
    ================================================*/
    /*-- Comprueba si se está visualizando un intento de test --*/
    if (props.testobj.getIntento() == null) {
        props.testobj.setTiempoInicio();
        props.testobj.setTiempoFin();
        intervalo = setInterval(() => props.testobj.setTiempoFin(), 1000);
    }

    // const testObj = ref(new TestModel.Test());
    // const testCtrl = ref(new TestController(props.testobj));

    /*==============================================
                PROPIEDADES COMPUTADAS
    ===============================================*/
    const claseAlerta = computed(() => {
        if (sended.value == true && error.value == false) {
            if (props.testobj.getNota() < 5) {
                return "alert-danger";
            } else if (props.testobj.getNota() >= 5 && props.testobj.getNota() < 7) {
                return "alert-warning";
            } else if (props.testobj.getNota() >= 7 && props.testobj.getNota() < 9) {
                return "alert-success";
            } else {
                return "alert-success sobresaliente";
            }
        } else {
            return "alert-danger";
        }
    });

    const mensajeAlerta = computed(() => {
        if (sended.value == true && error.value == false) {
            if (props.testobj.getNota() < 5) {
                return "Necesitas estudiar";
            } else if (props.testobj.getNota() >= 5 && props.testobj.getNota() < 7) {
                return "Debes repasar";
            } else if (props.testobj.getNota() >= 7 && props.testobj.getNota() < 9) {
                return "¡Enhorabuena! Has sacado un notable";
            } else {
                return "Are you a BrainBoost warrior?";
            }
        } else {
            return "Se ha producido un error al enviar tus respuestas al servidor.";
        }
    });

    const preguntasRandomOrder = computed(() => {
        // console.log("Hola desde preguntasRandomOrder computed");
        // const devolucion = props.testobj.preguntas.sort(() => 0.5 - Random.randomFloat());
        const devolucion = props.testobj.preguntas;

        /*-- Comprueba si se está visualizando un intento de test --*/
        if (props.testobj.getIntento() != null) {
            return devolucion; // No hace nada más, devuelve el array de las preguntas tal cual, y no baraja tampoco las respuestas
        }
        
        barajarArray(devolucion); // lo pilla del utilidades.js

        devolucion.forEach(element => {
            switch (element.tipo_pregunta) {
                case TestModel.TipoPregunta.MULTIPLE_RESPONSE: // Tipo 1
                case TestModel.TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE: // Tipo 2
                    // element.datos_pregunta.respuestas.sort(() => 0.5 - Random.randomFloat());
                    barajarArray(element.datos_pregunta.respuestas);
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

    function sendTest(e) {
        if (!sended.value) {
            clearInterval(intervalo); // Para el cronómetro
            try {
                props.testctrl.sendInfoIntentoTestUsuario((response) => {
                    console.log("Hasta aquí funciona el código: el servidor no ha dado error");
                    // console.log(response);
                    if ("datosTest" in response && "preguntasTestRealizado" in response) {
                        // window.history.back(); // Para volver a la página anterior
                        sended.value = true;
                        error.value = false;
                        // const btn = document.createElement("button");
                        // btn.setAttribute
                        e.target.setAttribute("disabled", "disabled")
                        window.scrollTo({top: 0, behavior: "smooth"});
                    }
                })
                .catch(err => {
                    console.error(err);
                    sended.value = false;
                    error.value = true;
                    window.scrollTo({top: 0, behavior: "smooth"});
                    // Reanuda el cronómetro
                    intervalo = setInterval(() => {
                        props.testobj.setTiempoFin();
                        // console.log("Estoy aumentando el tiempo");
                    }, 1000);
                });
            } catch (err) {
                sended.value = false;
                error.value = true;
                window.scrollTo({top: 0, behavior: "smooth"});
                // Reanuda el cronómetro
                intervalo = setInterval(() => {
                    props.testobj.setTiempoFin();
                    // console.log("Estoy aumentando el tiempo");
                }, 1000);
            }
        }
    }
</script>

<style scoped>
    .alert-success.sobresaliente {
        /* https://cssgradient.io/ */
        /* https://awik.io/animate-css-gradient-background/#:~:text=Let%E2%80%99s%20look%20at%20how%20we%20can%20animate%20a,or%20use%20%40keyframes%20to%20animate%20the%20position%20change.*/
        /* https://www.w3schools.com/cssref/css3_pr_animation.php */
        background: rgb(1,62,35);
        background: linear-gradient(270deg, rgba(105, 168, 141, 0.806) 0%, rgba(66, 180, 133, 0.851) 35%, rgba(73, 208, 235, 0.811) 100%);
        background-size: 400% 400%;
        animation: gradient 5s ease-in-out infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
            color: rgb(21, 87, 36);
            border-color: rgb(207, 230, 212);
        }
        50% {
            background-position: 100% 50%;
            color: rgb(207, 230, 212);
            border-color: rgb(21, 87, 36);
        }
        100% {
            background-position: 0% 50%;
            color: rgb(21, 87, 36);
            border-color: rgb(207, 230, 212);
        }
    }
</style>
