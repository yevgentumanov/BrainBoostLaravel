<template>
    <div id="preview" :class="['row', 'm-4']">
        
    </div>
</template>

<script>
    export default {
        created() {
            console.log("createdPreview"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedPreview"); // Mera bandera de debug
        }
    }
</script>

<script setup>
    // import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    import {TestController} from "../TestController.js";
    import { storeToRefs } from 'pinia'
    import { useMyStore } from "../piniastore";

    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const myStore = useMyStore();
    const {testObj, testCtrl, url} = storeToRefs(myStore);

    /*==============================================
                    MÉTODOS
    ===============================================*/
    function estudiarTest(evento) {
        // window.alert("estudiarTest");
        testObj.value.setModalidad(TestModel.TipoModalidad.ESTUDIAR);
    }
    
    function practicarTest(evento) {
        // window.alert("practicarTest");
        testObj.value.setModalidad(TestModel.TipoModalidad.PRACTICAR);
    }
    
    function desafioTest(evento) {
        // window.alert("desafioTest");
        testObj.value.setModalidad(TestModel.TipoModalidad.DESAFÍO);
    }
</script>

<style scoped>

</style>
