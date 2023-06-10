<template>
    <section class="row bg-primary seccion-mb s-materia">
        <div class="col-12 m-2 d-flex justify-content-between align-items-center">
            <!-- <h3>TEST - {{ $test->nombre_test }}</h3> -->
            <h3 class="d-none" :class='["d-block"]'>TEST - {{ testObj.getNombreTest() }}</h3>
            <h5 class="d-none" :class='["d-block"]' v-if="testObj.getModalidad() != null">{{modalidadString}}</h5>
            <h5 class="d-none" :class='["d-block"]' v-if="testObj.getDificultad() != null">{{dificultadString}}</h5>
            <h5 class="d-none" :class='["d-block"]' v-if="testObj.getTiempoInicio() != null">{{tiempoTranscurrido[0]}}:{{tiempoTranscurrido[1]}}:{{tiempoTranscurrido[2]}}</h5>
            <h5 class="d-none" :class='["d-block"]'>{{testObj.getNota() != null ? "Nota: " + testObj.getNota() : ""}}</h5>
        </div>
    </section>

    <div id="bloque-preguntas" class="row seccion-mb sombra_borde redondeado s-materia">
        <div class="col-12 seccion-mb">
            <eligemodalidad 
                v-if="testObj.getModalidad() == null">
            </eligemodalidad>
            <preview 
                v-if="testObj.getModalidad() == TestModel.TipoModalidad.ESTUDIAR">
            </preview>
            <eligedificultad 
                v-if="testObj.getModalidad() != null &&
                    testObj.getModalidad() != TestModel.TipoModalidad.ESTUDIAR &&
                    testObj.getDificultad() == null">
            </eligedificultad>
            <dotest 
                v-if="testObj.getModalidad() != null && testObj.getDificultad() != null">
            </dotest>
        </div>
    </div>

    <!-- <eligemodalidad :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() == null">
    </eligemodalidad>
    <preview :testobj="testobj" :testctrl="testctrl"
        v-if="testobj.getModalidad() == TestModel.TipoModalidad.ESTUDIAR">
    </preview>
    <eligedificultad :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() != null &&
              testobj.getModalidad() != TestModel.TipoModalidad.ESTUDIAR &&
              testobj.getDificultad() == null">
    </eligedificultad>
    <dotest :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() != null && testobj.getDificultad() != null">
    </dotest> -->
</template>

<script>
    import eligemodalidad from "./eligeModalidad.js.vue"
    import eligedificultad from "./eligeDificultad.js.vue"
    import preview from "./preview.js.vue"
    import dotest from "./dotest.js.vue"
    export default {
        created() {
            console.log("createdMain"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedMain"); // Mera bandera de debug
        }
    }
</script>

<script setup>
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    import {TestController} from "../TestController.js";
    import { storeToRefs } from 'pinia'
    import { useMyStore } from "../piniastore";

    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    // const props = defineProps({
    //     testobj: TestModel.Test,
    //     testctrl: TestController
    // });
    const myStore = useMyStore();
    const {testObj, testCtrl, url} = storeToRefs(myStore);

    /*-- Inicialización --*/
    const pathName = url.value.pathname.split("/");
    const idTest = Number.parseInt(pathName[pathName.length - 1]);
    testObj.value.idTest = idTest;

    /*-- Ordena al controlador que descargue dentro del TestModel las preguntas y la info del test --*/
    try {
        testCtrl.value.downloadInfoAboutTestByIdTest(testObj.value.getIdTest())
        .then(response => {
            /*-- Una vez que obtiene la información general del test, obtiene el resto de datos --*/
            testCtrl.value.downloadQuestionsByIdTest(testObj.value.getIdTest());
            /*-- Obtiene los datos del test realizado por el usuario (en caso de estar visualizando un test ya realizado dado un numero de intento) --*/
            const intento = url.value.searchParams.get("intento");
            if (intento != null) {
                testCtrl.value.downloadInfoIntentoUsuario(intento);
            }
        });
        
    } catch (error) {
        console.error(error);
    }
    
    console.log(testObj.value);

    /*==============================================
                PROPIEDADES COMPUTADAS
    ===============================================*/
    const modalidadString = computed(() => {
        if (testObj.value.getModalidad() != null) {
            let cadena = TestModel.TipoModalidadInversa[testObj.value.getModalidad()];
            cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
            return cadena;
        }
    });
    const dificultadString = computed (() => {
        if (testObj.value.getDificultad() != null) {
            let cadena = TestModel.TipoDificultadInversa[testObj.value.getDificultad()];
            cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
            return cadena;
        }
    });
    const tiempoTranscurrido = computed(() => {
        const tiempo = testObj.value.getTiempoTranscurrido()
        const horas = `${tiempo[0] < 10 ? "0" : ""}${tiempo[0]}`;
        const minutos = `${tiempo[1] < 10 ? "0" : ""}${tiempo[1]}`;
        const segundos = `${tiempo[2] < 10 ? "0" : ""}${tiempo[2]}`;
        return [horas, minutos, segundos];
    });
    // const testObj = ref(new TestModel.Test());
    // const testCtrl = ref(new TestController(props.testobj));

    
    /*==============================================
                    MÉTODOS
    ===============================================*/
    
</script>

<style scoped>

</style>
