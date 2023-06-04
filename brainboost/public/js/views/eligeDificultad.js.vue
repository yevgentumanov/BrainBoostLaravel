<template>
    <section :class="['row', 'bg-primary', 'm-4']">
        <div class="col-11 p-2">
            <p>Elige la dificultad:</p>
            <p>Empezar test</p>
        </div>
    </section>
</template>

<script setup>
    import { ref, computed } from "vue"; // habilita la función de reactividad y las propiedades computadas
    const variable = 0; // variable estatica
    const variable2 = ref(1); // variable reactiva
    const incremento = () => {
        // Código a ejecutar
    }
    const propiedadComputada = computed(() => {
        // Código a ejecutar
    })

</script>

<style scoped>

</style>