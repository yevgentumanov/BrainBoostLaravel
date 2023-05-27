/**
 * Fichero donde se implementarán métodos para crear la vista del test dinámicamente mediante Vue, con los datos que reciba de TestModel, gracias a TestController.
 * @author Santiago
 * @version 23.05.2023
 */

document.addEventListener('DOMContentLoaded', () => {
    const app = new Vue({
        el: '#appVue',
        data: {
            tiposPregunta: TipoPregunta,
            testObj: new Test(),
            testCtrl: null,
        },
        computed: {
            preguntasRandomOrder() {
                return this.testObj.preguntas.sort(() => 0.5 - Random.randomFloat());
            }
        },
        methods: {
            respuestasRandomOrder(i) {
                return this.preguntasRandomOrder[i].datos_pregunta.respuestas.sort(() => 0.5 - Random.randomFloat());
            }
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
            this.testCtrl.downloadQuestionsByIdTest(this.testObj.getIdTest());
            console.log(this.testObj);
        }
    });
});