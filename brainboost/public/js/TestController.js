/**
 * Fichero donde se implementarán métodos para crear el controlador, es decir, la lógica de la página de test, así como la descarga de preguntas y la subida de respuestas al servidor.
 * @author Santiago
 * @version 11.06.2023
 */

import {Test} from "./TestModel"
import {MensajesErrorTest} from "./TestModel"
export class TestController {
    /**
     * Constructor para TestController.
     * @param {Test} test Especifica un objeto de tipo Test.
     */
    constructor(test) {
        /*-- Realiza las validaciones --*/
        if (test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);

        /*-- Almacena el test --*/
        this.test = test;
    }

    /**
     * Método que devuelve el objeto de tipo Test que maneja este TestController.
     * @returns El objeto de tipo Test que maneja este TestController.
     */
    getTest() {
        return this.test;
    }

    /**
     * Descarga información acerca del test.
     * - Nombre test
     * - Descripcion
     * - Numero de preguntas
     * - Numero visitas
     * - Id usuario creador
     * - Nombre usuario creador
     * - Id materia
     * 
     * @param {number} idTest - Especifica el id del test.
     */
    downloadInfoAboutTestByIdTest(idTest) {
        /*-- Realiza las validaciones --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);
        if (!this.test.validaIdBD(idTest)) throw new Error(MensajesErrorTest["__ERR_TEST_ID_INVALID"].message);

        /*-- Obtiene los datos del servidor --*/
        const rutaRelativa = calcularRuta(Rutas.RUTA_API_TEST.url);
        return new Promise((resolve, reject) => {
            // obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_TEST.url, Rutas.RUTA_API_TEST.method, null, { id: idTest })
            obtenerJSON(rutaRelativa, Rutas.RUTA_API_TEST.method, null, { id: idTest })
                .then(response => {
                    this.test.size = response.cant_preguntas;
                    this.test.setDescripcion(response.descripcion);
                    this.test.fechaCreacion = new Date(response.fecha_creacion);
                    this.test.idTest = response.id;
                    this.test.idMateria = response.id_materia; // No usa setIDMateria, porque este invoca a la validacion, y esta podría tener lugar antes de que se hayan descargado los datos de las materias desde la API
                    this.test.idUsuarioCreador = response.id_usuario_creador;
                    this.test.setNombreTest(response.nombre_test);
                    this.test.nombreUsuarioCreador = response.nombreUsuarioCreador;
                    this.test.numeroVisitas = response.numero_visitas;
                    resolve("OK");
                }).catch(error => {
                    /*-- Descarta que haya dado error --*/
                    // console.log(this.test);
                    console.dir(error);
                    reject(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error}`);
                });
        });
    }

    /**
     * Método que descarga del servidor las 10 siguientes preguntas (y sus respuestas).
     * 
     * @param {number} idTest - Especifica el id del test.
     * @throws {Error} Puede lanzar un error si no consigue descargar la información de las preguntas del servidor.
     */
    downloadQuestionsByIdTest(idTest) {
        /*-- Realiza las validaciones --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);
        if (!this.test.validaIdBD(idTest)) throw new Error(MensajesErrorTest["__ERR_TEST_ID_INVALID"].message);

        /*-- Obtiene los datos del servidor --*/
        // datos cabecera (sustituir segundo null): {id: idTest, pagina: 1}
        // pagina es un atributo que indica el nº de página que se está mostrando. Los tests se van cargando en páginas, por ejemplo, de 10 en 10 preguntas, para reducir la carga del servidor cuando se trate de tests muy largos.
        // console.log(rutaRelativa);
        // console.log(Rutas.RUTA_API_PREGUNTAS.url);
        const rutaRelativa = calcularRuta(Rutas.RUTA_API_PREGUNTAS.url);
        return new Promise((resolve, reject) => {
            // obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_PREGUNTAS.url, Rutas.RUTA_API_PREGUNTAS.method, null, { id: idTest })
            obtenerJSON(rutaRelativa, Rutas.RUTA_API_PREGUNTAS.method, null, { id: idTest })
                .then(response => {
                    response.forEach(pregunta => {
                        // if (this.test.idTest == null) {
                        //     this.test.idTest = response.id_test;
                        // }
                        // delete pregunta.id_test;
                        this.test.idTest = idTest; // Por si downloadInfoAboutTestByIdTest() fallara al obtener los datos del test falle
    
                        /*-- Agrega la pregunta al array de preguntas --*/
                        pregunta.datos_pregunta = JSON.parse(pregunta.datos_pregunta);
                        this.test.addPregunta(pregunta);
                    });
                    /*-- Settea a null la respuesta correspondiente a la pregunta --*/
                    for (let i = 0; i < this.test.getSize(); i++) {
                        this.test.setRespuesta(i, null);
                    }
                    resolve("OK");
                }).catch(error => {
                    console.dir(error);
                    reject(`${MensajesErrorTest["__ERR_QUESTIONS_FETCH"].message} Mensaje de error: ${error}`);
                });
        });
    }

    /**
     * Método que envía al servidor la información del intento del test del usuario.
     * @param {Function} todoDone - (Opcional) Especifica una función con un parámetro (response) que se ejecutará cuando el fetch tenga éxito.
     */
    sendInfoIntentoTestUsuario(todoDone = null) {
        /*-- Realiza las validaciones --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);

        /*-- Prepara los datos para enviarselos al servidor --*/
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const cabeceras = {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
        };
        let cuerpo = {
            id_test: this.test.getIdTest(),
            modalidad: this.test.getModalidad(),
            dificultad: this.test.getDificultad(),
            tiempoInicio: this.test.getTiempoInicio(), // toISOString() Formato ISO-8601
            tiempoFin: this.test.getTiempoFin(), // toISOString() Formato ISO-8601
            preguntasTestRealizado: []
        };
        for (let i = 0; i < this.test.getPreguntas().length; i++) {
            const pregunta = this.test.getPreguntas()[i];
            const respuestas = this.test.getRespuestas()[i];
            const nota = this.test.getNotaPregunta(i)

            const objPreparado = {
                id_pregunta: pregunta.id,
                nota_pregunta: nota,
                respuestas: respuestas
            };

            cuerpo.preguntasTestRealizado.push(objPreparado)
        }
        // console.log(cuerpo.preguntasTestRealizado.length);
        // console.log(cuerpo.preguntasTestRealizado);
        // console.log(this.test.getRespuestas().length);
        // console.log(this.test.getRespuestas());

        /*-- Envía los datos al servidor --*/
        // sended = false; // De cuando estaba en el dotest.js.vue
        const rutaRelativa = calcularRuta(Rutas.RUTA_API_ENVIO_TEST_REALIZADO.url);
        return new Promise((resolve, reject) => {
            // obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_ENVIO_TEST_REALIZADO.url, Rutas.RUTA_API_ENVIO_TEST_REALIZADO.method, cabeceras, JSON.stringify(cuerpo))
            obtenerJSON(rutaRelativa, Rutas.RUTA_API_ENVIO_TEST_REALIZADO.method, cabeceras, JSON.stringify(cuerpo))
                .then(response => {
                    if (todoDone instanceof Function) {
                        todoDone(response);
                    }
                    resolve("OK");
                }).catch(error => {
                    /*-- Descarta que haya dado error --*/
                    // console.log(this.test);
                    console.dir(error);
                    reject(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error}`);
                });
        });
    }

    /**
     * Método que descarga del servidor (si existe) la información del usuario que ha realizado este intento del test.
     * - test.idUsuarioRealizador
     * - test.idTest
     * - test.nota
     * - test.fecha_realizacion
     * - test.respuestas
     * Es decir, descarga su nota, dado un id intento de test.
     * @param {number} nintentoTest Especifica el id del intento del test.
     */
    downloadInfoIntentoUsuario(nintentoTest) {
        /*-- Descarta que el idUsuario no sea válido --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);
        if (!this.test.validaIdBD(Number.parseInt(nintentoTest))) throw new Error(MensajesErrorTest["__ERR_ATTEMPT_TEST_ID_INVALID"].message);

        /*-- Creación de variables temporales --*/
        let nota = null;
        let idUsuario = null;
        let fechaRealizacion = null;

        /*-- Prepara los datos para enviarselos al servidor --*/
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const cabeceras = {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
        };
        const cuerpo = {
            id_test: this.test.getIdTest(),
            intento: nintentoTest
        };

        /*-- Descarga la información de las respuestas dadas por el usuario desde el servidor --*/
        // ... To do
        const rutaRelativa = calcularRuta(Rutas.RUTA_API_PREGUNTAS_REALIZADAS_INTENTO.url);
        return new Promise((resolve, reject) => {
            // obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_ENVIO_TEST_REALIZADO.url, Rutas.RUTA_API_ENVIO_TEST_REALIZADO.method, cabeceras, JSON.stringify(cuerpo))
            obtenerJSON(rutaRelativa, Rutas.RUTA_API_PREGUNTAS_REALIZADAS_INTENTO.method, cabeceras, JSON.stringify(cuerpo))
                .then(response => {
                    console.log(response);
                    /*-- Descarga la nota y establece los datos en el objeto Test --*/
                    this.test.idUsuarioRealizador = response.data[0].id_usuario;
                    this.test.fechaRealizacion = new Date(response.data[0].fecha_realizacion);
                    this.test.intento = response.data[0].intento; // To do
                    const tiempoInicioResponse = response.data[0].tiempo_inicio.split(":");
                    let tiempoInicio = new Date(this.test.getFechaRealizacion());
                    tiempoInicio.setUTCHours(tiempoInicioResponse[0]);
                    tiempoInicio.setUTCMinutes(tiempoInicioResponse[1]);
                    tiempoInicio.setUTCSeconds(tiempoInicioResponse[2]);
                    // console.log(tiempoInicioResponse);
                    // console.log(tiempoInicio);
                    this.test.tiempoInicio = tiempoInicio;

                    const tiempoFinResponse = response.data[0].tiempo_fin.split(":");
                    let tiempoFin = new Date(this.test.getFechaRealizacion());
                    tiempoFin.setUTCHours(tiempoFinResponse[0]);
                    tiempoFin.setUTCMinutes(tiempoFinResponse[1]);
                    tiempoFin.setUTCSeconds(tiempoFinResponse[2]);
                    // console.log(tiempoFinResponse);
                    // console.log(tiempoFin);
                    this.test.tiempoFin = tiempoFin;

                    /*-- Añade las respuestas --*/
                    for (let i = 0; i < response.data.length; i++) {
                        this.test.setRespuesta(i, JSON.parse(response.data[i].respuestas));
                        this.test.setNotaPregunta(i, Number.parseFloat(response.data[i].nota_pregunta));
                    }

                    /*-- Establece la modalidad y la dificultad --*/
                    this.test.setModalidad(response.data[0].modalidad);
                    this.test.setDificultad(response.data[0].dificultad);
                    // console.log(this.test);
                    resolve("OK");
                }).catch(error => {
                    /*-- Descarta que haya dado error --*/
                    // console.log(this.test);
                    console.dir(error);
                    reject(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error}`);
                });
        });
    }

    /**
     * Método que sirve para enviar una petición al servidor para informar de que ha habido una nueva visita al test.
     * @param {number} idTest - Especifica el id del test.
     */
    aumentarVisitas(idTest) {
        /*-- Realiza las validaciones --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);
        if (!this.test.validaIdBD(idTest)) throw new Error(MensajesErrorTest["__ERR_TEST_ID_INVALID"].message);

        /*-- Prepara los datos para enviarselos al servidor --*/
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const cabeceras = {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
        };

        let ruta = Rutas.RUTA_API_AUMENTAR_VISITAS_TEST.url.split("/");
        ruta[2] = idTest;
        console.log(ruta);
        const rutaRelativa = ruta.join("/");
        console.log(rutaRelativa);
        /*-- Realiza la petición al servidor --*/
        
        obtenerJSON(rutaRelativa, Rutas.RUTA_API_AUMENTAR_VISITAS_TEST.method, cabeceras, null)
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        })
    }
}

/*=============================================
        MÉTODOS ASOCIADOS AL CONTROLADOR
===============================================*/
