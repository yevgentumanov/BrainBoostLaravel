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
            corregirPregunta(indice) {
                const pregunta = this.testObj.preguntas[indice];
                const respuesta = this.testObj.respuestas[indice];
                switch (pregunta.tipo_pregunta) {
                    case TipoPregunta.MULTIPLE_RESPONSE:
                    case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE:
                        /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
                        const preguntasAcertadas = compareArraysWithoutOrder(respuesta, pregunta.datos_pregunta.respuestas_correctas).length
                        this.testObj.nota += preguntasAcertadas / pregunta.datos_pregunta.respuestas_correctas.length;
                        break;
                    case TipoPregunta.UNIQUE_RESPONSE:
                        
                    case TipoPregunta.FILL_IN_GAPS: // Tipo 4
                    case TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
                    case TipoPregunta.FILL_TABLE: // Tipo 5
                }
                
            },
            opcionSeleccionada(evento) {
                const input = evento.target;
                const label = input.labels[0].textContent;
                const divRespuesta = input.parentElement;
                const divPregunta = divRespuesta.parentElement.parentElement; // section.row, por eso hago dos parentElement
                const padre = divPregunta.parentElement;
                const listaPreguntas = Array.from(padre.children);

                /*-- Obtiene el índice de la pregunta --*/
                const indice = listaPreguntas.indexOf(divPregunta);
                // console.log(padre);
                // console.dir(padre);
                // console.log(divPregunta);
                // console.dir(divPregunta);
                // console.log(divRespuesta);
                // console.dir(divRespuesta);
                // console.log(input);
                // console.dir(input);
                // console.log(label);
                // console.dir(label);

                /*-- Almacena la respuesta en el objeto test --*/
                let respuesta = [label];
                console.log(respuesta);
                this.testObj.setRespuesta(indice, respuesta);

                /*-- Comprueba si la respuesta era correcta --*/
                this.corregirPregunta(indice);
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
            /*-- Ordena al controlador que descargue dentro del TestModel las preguntas y la info del test --*/
            try {
                this.testCtrl.downloadInfoAboutTestByIdTest(this.testObj.getIdTest());
                this.testCtrl.downloadQuestionsByIdTest(this.testObj.getIdTest());
            } catch (error) {
                console.error(error);
            }
            
            console.log(this.testObj);
        }
    });

    app.mount("#appVue");
});