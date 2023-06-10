/**
 * Fichero donde se implementarán métodos para crear la vista del test dinámicamente mediante Vue, con los datos que reciba de TestModel, gracias a TestController.
 * @author Santiago
 * @version 10.06.2023
 */

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import TestVue from './views/main.js.vue'
import * as TestModel from "./TestModel.js";
import {TestController} from "./TestController.js";


document.addEventListener('DOMContentLoaded', () => {
    const pinia = createPinia();
    const app = createApp(TestVue) //{
    //     data() {
    //         return {
    //             testObj: new TestModel.Test(),
    //             testCtrl: null,
    //             url: new URL(document.location.href)
    //         }
    //     },
    //     computed: {
    //         modalidadString() {
    //             if (this.testObj.getModalidad() != null) {
    //                 let cadena = TestModel.TipoModalidadInversa[this.testObj.getModalidad()];
    //                 cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
    //                 return cadena;
    //             }
    //         },
    //         dificultadString() {
    //             if (this.testObj.getDificultad() != null) {
    //                 let cadena = TestModel.TipoDificultadInversa[this.testObj.getDificultad()];
    //                 cadena = cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
    //                 return cadena;
    //             }
                
    //         },
    //         tiempoTranscurrido() {
    //             const tiempo = this.testObj.getTiempoTranscurrido()
    //             const horas = `${tiempo[0] < 10 ? "0" : ""}${tiempo[0]}`;
    //             const minutos = `${tiempo[1] < 10 ? "0" : ""}${tiempo[1]}`;
    //             const segundos = `${tiempo[2] < 10 ? "0" : ""}${tiempo[2]}`;
    //             return [horas, minutos, segundos];
    //         }
    //     },
    //     created() {
    //         console.log("created"); // Mera bandera de debug
    //         /*-- Crea el controlador para el TestModel.js --*/
    //         this.testCtrl = new TestController(this.testObj); // Inicia el controlador

    //         /*-- Obtiene el id de la URL desde donde se está visitando la página que ha importado Vue --*/
    //         // const rutaDesglosada = document.location.href.split("/");
    //         // const lastSlash = rutaDesglosada[rutaDesglosada.length - 1];
    //         // const indiceSeparador = lastSlash.indexOf("?");
    //         // const id = Number.parseInt(indiceSeparador != -1 ? lastSlash.substring(0, indiceSeparador) : lastSlash);
    //         // this.testObj.idTest = id;
            
            
    //         // Viejo
    //         // const pathName = this.url.pathname.split("/");
    //         // const idTest = Number.parseInt(pathName[pathName.length - 1]);
    //         // this.testObj.idTest = idTest;
            
    //     },
    //     mounted() {
    //         console.log("mounted"); // Mera bandera de debug
    //         /*-- Ordena al controlador que descargue dentro del TestModel las preguntas y la info del test --*/
    //         try {
    //             this.testCtrl.downloadInfoAboutTestByIdTest(this.testObj.getIdTest())
    //             .then(response => {
    //                 /*-- Una vez que obtiene la información general del test, obtiene el resto de datos --*/
    //                 this.testCtrl.downloadQuestionsByIdTest(this.testObj.getIdTest());
    //                 /*-- Obtiene los datos del test realizado por el usuario (en caso de estar visualizando un test ya realizado dado un numero de intento) --*/
    //                 const intento = this.url.searchParams.get("intento");
    //                 if (intento != null) {
    //                     this.testCtrl.downloadInfoIntentoUsuario(intento);
    //                 }
    //             });
                
    //         } catch (error) {
    //             console.error(error);
    //         }
            
    //         console.log(this.testObj);
    //     }
    // });

    app.use(pinia);
    app.component("testvue", TestVue)
    app.mount("#appVue");
});