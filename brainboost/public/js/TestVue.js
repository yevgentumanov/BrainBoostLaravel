/**
 * Fichero donde se implementarán métodos para crear la vista del test dinámicamente mediante Vue, con los datos que reciba de TestModel, gracias a TestController.
 * @author Santiago
 * @version 28.05.2023
 */
import { createApp } from 'vue'
document.addEventListener('DOMContentLoaded', () => {
    const app = createApp({
        data() {
            return {
                tiposPregunta: TipoPregunta,
                testObj: new Test(),
                testCtrl: null,
            }
        },
        computed: {
            preguntasRandomOrder() {
                const devolucion = this.testObj.preguntas.sort(() => 0.5 - Random.randomFloat());
                devolucion.forEach(element => {
                    switch (element.tipo_pregunta) {
                        case TipoPregunta.MULTIPLE_RESPONSE: // Tipo 1
                        case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE: // Tipo 2
                            element.datos_pregunta.respuestas.sort(() => 0.5 - Random.randomFloat());
                            break;
                        case TipoPregunta.UNIQUE_RESPONSE: // Tipo 3
                            break;
                        case TipoPregunta.FILL_IN_GAPS: // Tipo 4
                            break;
                        case TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
                            break;
                        case TipoPregunta.FILL_TABLE: // Tipo 6
                            break;
                    }
                });
                return devolucion;
            }
        },
        methods: {
            
        },
        created() {
            console.log("created"); // Mera bandera de debug
            /*-- Crea el controlador para el TestModel.js --*/
            this.testCtrl = new TestController(this.testObj); // Inicia el controlador

            /*-- Obtiene el id de la URL desde donde se está visitando la página que ha importado Vue --*/
            const rutaDesglosada = document.location.href.split("/");
            const lastSlash = rutaDesglosada[rutaDesglosada.length - 1];
            const indiceSeparador = lastSlash.indexOf("?");
            const id = Number.parseInt(indiceSeparador != -1 ? lastSlash.substring(0, indiceSeparador) : lastSlash);
            this.testObj.idTest = id;
        },
        mounted() {
            console.log("mounted"); // Mera bandera de debug
            /*-- Ordena al controlador que descargue dentro del TestModel las preguntas --*/
            // this.testCtrl.downloadInfoAboutTestByIdTest(id);
            try {
                this.testCtrl.downloadQuestionsByIdTest(this.testObj.getIdTest());
            } catch (error) {
                // console.error(error);
            }
            
            console.log(this.testObj);
        }
    });

    app.mount("#appVue");
});