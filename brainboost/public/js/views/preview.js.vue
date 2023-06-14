<template>
    <div id="preview" :class="['row', 'm-4']">
        
    </div>
</template>

<script>
    export default {
        created() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("createdPreview"); // Mera bandera de debug
            }
        },
        mounted() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("mountedPreview"); // Mera bandera de debug
            }
        }
    }
</script>

<script setup>
    // import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
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
</script>

<style scoped>

</style>
