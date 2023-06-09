<template>
    <fieldset data-componentName="optionsSet">
        <div v-for="(respuesta, indexRespuesta) in opciones" :key="indexRespuesta" class="px-4">
            <input :type="typeinput" v-model="opcionesmarcadas[opcionesmarcadas.length]" :id="indexoptionsset + ':' +  indexRespuesta" :name="indexoptionsset" :value="indexRespuesta" :disabled="disabled" class="mr-2" @change="opcionSeleccionada">
            <label :for="indexoptionsset + ':' +  indexRespuesta">{{ respuesta }}</label>
        </div>
    </fieldset>
</template>

<script>
    export default {
        created() {
            console.log("createdOptionsSet"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedOptionsSet"); // Mera bandera de debug
        }
    }
</script>

<script setup>
    import {ref, computed} from "vue"; // habilita la función de reactividad y las propiedades computadas
    import * as TestModel from "../TestModel.js";
    // import {TestController} from "../TestController.js";

    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
        indexoptionsset: Number,
        typeinput: String, // Puede ser: radio o checkbox
        opciones: Array,
        opcionesmarcadas: Array,
        disabled: Boolean,
        onchangeselected: Function
    });
    // const optionsMarked = ref(Array());
    // optionsMarked.value = 1;
    /*==============================================
                    MÉTODOS
    ===============================================*/
    function opcionSeleccionada(e) {
        if (props.typeinput == "radio") {

        } else if (props.typeinput == "checkbox") {

        }
        // console.log("optionsMarked");
        // console.log(optionsMarked.value);
        // console.log(props.opcionesmarcadas);
        props.onchangeselected(e);
    }
</script>

<style scoped>

</style>
