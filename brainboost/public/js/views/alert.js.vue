<template>
    <div class="alert" :class="[classalert]" role="alert">
        {{ message }}
    </div>
</template>

<script>
    export default {
        created() {
            console.log("createdModal"); // Mera bandera de debug
        },
        mounted() {
            console.log("mountedModal"); // Mera bandera de debug
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