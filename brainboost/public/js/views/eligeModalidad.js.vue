<template>
    <div id="eligeToDo" :class="['row', 'm-4']">
        <section class="col-12 p-2 bg-primary">
            <h5>Elige una opción</h5>
        </section>
        <div class="col-12 mt-4 d-flex justify-content-between">
            <!-- <button class="btn btn-light" @click="estudiarTest">Estudiar test</button> -->
            <modal txtbtninvoker="Estudiar test" 
                   classbtninvoker="btn-dark" 
                   title="Función no implementada" 
                   message="La función de previsualización del test para poder estudiarlo aún no ha sido implementada.">
            </modal>
            <button class="btn btn-light" @click="practicarTest">Practicar test</button>
            <button class="btn btn-light" @click="desafioTest">Desafío test</button>
        </div>
    </div>
</template>

<script>
    import Modal from "./modal.js.vue"
    export default {
        components: {
            "modal": Modal
        },
        created() {
            console.log("createdEligeModalidad"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedEligeModalidad"); // Mera bandera de debug
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
    function estudiarTest(evento) {
        // window.alert("estudiarTest");
        window.alert("No implementado aún.")
        // props.testobj.setModalidad(TestModel.TipoModalidad.ESTUDIAR);
    }
    
    function practicarTest(evento) {
        // window.alert("practicarTest");
        props.testobj.setModalidad(TestModel.TipoModalidad.PRACTICAR);
    }
    
    function desafioTest(evento) {
        // window.alert("desafioTest");
        props.testobj.setModalidad(TestModel.TipoModalidad.DESAFÍO);
    }
</script>

<style scoped>

</style>
