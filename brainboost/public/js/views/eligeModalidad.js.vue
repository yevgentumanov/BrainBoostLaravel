<template>
    <div id="eligeModalidad" :class="['row', 'm-4']">
        <section class="col-12 p-2 bg-primary text-center">
            <h5>Elige una opción</h5>
        </section>
        <div class="col-12 mt-4 d-flex justify-content-between">
            <!-- <button class="btn btn-light" @click="estudiarTest">Estudiar test</button> -->
            <div class="d-flex flex-column justify-content-between">
                <modal txtbtninvoker="Estudiar test" 
                       classbtninvoker="btn-dark btn-5" 
                       title="Función no implementada" 
                       message="La función de previsualización del test para poder estudiarlo aún no ha sido implementada.">
                </modal>
                <button class="btn btn-outline-light mt-2" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Estudiar" 
                        data-content='En el modo "Estudiar" podrás ver el contenido del test para poder estudiártelo antes de enfrentarte a él.'>
                    ?
                </button>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <button class="btn btn-light btn-5" @click="practicarTest">Practicar test</button>
                <button class="btn btn-outline-light mt-2" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Practicar" 
                        data-content='En el modo "Practicar" te enfrentarás al test, con intentos ilimitados para cada pregunta. ¡A practicar y entrenar!'>
                    ?
                </button>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <button class="btn btn-light btn-5" @click="desafioTest">Desafío test</button>
                <button class="btn btn-outline-light mt-2" 
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Desafío" 
                        data-content='En el modo "Desafío" te enfrentarás al test, con un único intento por pregunta. ¡Ve a por todas!'>
                    ?
                </button>
            </div>
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
            /*-- Habilita los popovers de Bootstrap --*/
            $(function () {
                $('[data-toggle="popover"]').popover({
                    container: '#eligeModalidad'
                })
            })
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
