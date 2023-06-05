/**
 * Fichero donde se implementarán métodos para crear el controlador, es decir, la lógica de la página de test, así como la descarga de preguntas y la subida de respuestas al servidor.
 * @author Santiago
 * @version 24.05.2023
 */

import {Test} from "./TestModel"
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
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_TEST.url, Rutas.RUTA_API_TEST.method, null, { id: idTest })
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
            }).catch(error => {
                /*-- Descarta que haya dado error --*/
                console.log(this.test);
                console.dir(error);
                throw new Error(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error}`);
            })
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
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_PREGUNTAS.url, Rutas.RUTA_API_PREGUNTAS.method, null, { id: idTest })

            .then(response => {
                response.forEach(pregunta => {
                    // if (this.test.idTest == null) {
                    //     this.test.idTest = response.id_test;
                    // }
                    // delete response.id_test;
                    this.test.idTest = idTest; // Para prevenir que la petición de obtener los datos del test falle

                    /*-- Agrega la pregunta al array de preguntas --*/
                    pregunta.datos_pregunta = JSON.parse(pregunta.datos_pregunta);
                    this.test.addPregunta(pregunta);

                    /*-- To do: Debo inicializar el array de respuestas de TestModel a null, pero con la estructura creada --*/
                    
                });
            }).catch(error => {
                /*-- Descarta que haya dado error --*/
                throw new Error(`${MensajesErrorTest["__ERR_QUESTIONS_FETCH"].message} Mensaje de error: ${error}`);
            });
    }

    /**
     * Método que envía al servidor la información del intento del test del usuario.
     * @param {Function} todoDone - (Opcional) Especifica una función con un parámetro (response) que se ejecutará cuando el fetch tenga éxito.
     */
    sendInfoIntentoTestUsuario(todoDone = null) {
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
        
        /*-- Envía los datos al servidor --*/
        // sended.value = false;
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_ENVIO_TEST_REALIZADO.url, Rutas.RUTA_API_ENVIO_TEST_REALIZADO.method, cabeceras, JSON.stringify(cuerpo))
            .then(response => {
                if (todoDone instanceof Function) {
                    todoDone(response);
                }
            }).catch(error => {
                /*-- Descarta que haya dado error --*/
                console.log(this.test);
                console.dir(error);
                // throw new Error(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error}`);
            })
    }

    /**
     * Método que descarga del servidor (si existe) la información del usuario que ha realizado este intento del test.
     * - test.idUsuarioRealizador
     * - test.idTest
     * - test.nota
     * - test.fecha_realizacion
     * - test.respuestas
     * Es decir, descarga su nota, dado un id intento de test.
     * @param {number} idIntentoTest Especifica el id del intento del test.
     */
    downloadInfoIntentoUsuario(idIntentoTest) {
        /*-- Descarta que el idUsuario no sea válido --*/
        if (this.test instanceof Test == false) throw new Error(MensajesErrorTest["__ERR_TEST_OBJECT_INVALID"].message);
        if (!this.test.validaIdBD(idIntentoTest)) throw new Error(MensajesErrorTest["__ERR_ATTEMPT_TEST_ID_INVALID"].message);

        /*-- Creación de variables temporales --*/
        let nota = null;
        let idUsuario = null;
        let fechaRealizacion = null;

        /*-- Descarta que la info no exista en el servidor --*/
        // ... To do

        /*-- Descarga la nota y establece los datos en el objeto Test --*/
        this.test.idUsuarioRealizador = idUsuario;
        this.test.fechaRealizacion = fechaRealizacion;
        this.test.nota = nota;
    }

}

/*=============================================
        MÉTODOS ASOCIADOS AL CONTROLADOR
===============================================*/
