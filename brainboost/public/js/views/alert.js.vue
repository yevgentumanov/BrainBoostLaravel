<template>
    <div class="alert" :class="[classalert]" role="alert">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        {{ message }}
    </div>
</template>

<script>
    export default {
        created() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("createdAlert"); // Mera bandera de debug
            }
        },
        mounted() {
            if (modeApp == ModeAppEnum.LOCALDEBUG) {
                console.log("mountedAlert"); // Mera bandera de debug
            }
        }
    }
</script>

<script setup>
    // import { ref, computed } from "vue"; // habilita la función de reactividad y las propiedades computadas
    
    /*==============================================
                VARIABLES DE COMPONENTE
    ===============================================*/
    const props = defineProps({
		classalert: String,
		message: String,
    });

    /*==============================================
                    MÉTODOS
    ===============================================*/
    
</script>

<style scoped>

</style>