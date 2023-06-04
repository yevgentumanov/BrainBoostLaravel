<template>
    <!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" :class="[classbtninvoker]" data-toggle="modal" data-target="#exampleModalCenter">
		{{ txtbtninvoker }}
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">{{ title }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{{ message }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" @click="triggeraceptar">Aceptar</button>
				</div>
			</div>
		</div>
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
		txtbtninvoker: String,
		classbtninvoker: String,
		title: String,
		message: String,
        triggeraceptar: Function
    });

    /*==============================================
                    MÉTODOS
    ===============================================*/
    
</script>

<style scoped>

</style>