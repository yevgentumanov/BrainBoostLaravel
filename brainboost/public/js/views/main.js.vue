<template>
    <eligemodalidad :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() == null">
    </eligemodalidad>
    <!-- <preview :testobj="testobj" :testctrl="testctrl"
        v-if="testobj.getModalidad() == TestModel.TipoModalidad.ESTUDIAR">
    </preview> -->
    <eligedificultad :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() != null &&
            //   testobj.getModalidad() != TestModel.TipoModalidad.ESTUDIAR &&
              testobj.getDificultad() == null">
    </eligedificultad>
    <dotest :testobj="testobj" :testctrl="testctrl" 
        v-if="testobj.getModalidad() != null && testobj.getDificultad() != null">
    </dotest>
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
    // import {computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
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
                    MÉTODOS
    ===============================================*/
    
</script>

<style scoped>

</style>
