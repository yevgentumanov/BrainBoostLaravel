/**
 * Fichero donde se implementarán métodos para crear la vista del test dinámicamente mediante Vue, con los datos que reciba de TestModel, gracias a TestController.
 * @author Santiago
 * @version 03.06.2023
 */

import { createApp } from 'vue'
import TestVue from './views/main.js.vue'
import * as TestModel from "./TestModel.js";
import {TestController} from "./TestController.js";

document.addEventListener('DOMContentLoaded', () => {

    const app = createApp({
        data() {
            return {
                tiposPregunta: TestModel.TipoPregunta,
                testObj: new TestModel.Test(),
                testCtrl: null
            }
        },
        computed: {
            modalidadString() {
                if (this.testObj.getModalidad() != null) {
                    let cadena = TestModel.TipoModalidadInversa[this.testObj.getModalidad()];
                    cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
                    return cadena;
                }
            },
            dificultadString() {
                if (this.testObj.getDificultad() != null) {
                    let cadena = TestModel.TipoDificultadInversa[this.testObj.getDificultad()];
                    cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
                    return cadena;
                }
                
            },
            tiempoTranscurrido() {
                return testobj.getTiempoTranscurrido();
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

    app.component("testvue", TestVue)
    app.mount("#appVue");
});