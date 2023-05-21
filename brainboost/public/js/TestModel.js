/**
 * Fichero donde se implementa el modelo de datos que manejará el controlador.
 * @author Santiago
 * @version 21.05.2023
 */

/*===============================================
            ENUMERADOS Y CONSTANTES
=================================================*/

const TipoPregunta = {
    NONE: 0, // No se ha definido el tipo de pregunta
    MULTIPLE_RESPONSE: 1, // Múltiples respuestas, única opción correcta
    MULTIPLE_RESPONSE_MULTIPLE_CHOICE: 2, // Múltiples respuestas, de múltiple elección (varias respuestas correctas)
    UNIQUE_RESPONSE: 3, // Escribir la respuesta en una caja de texto
    FILL_IN_GAPS: 4, // Rellenar huecos (hay que rellenarlos todos)
    FILL_GAPS_GIVEN_ONE: 5, // Rellenar huecos dado uno (Ejemplo: verbos irregulares)
    NUMBER_MATCHING: 6 // Acertar el número (Ejemplo: acertar la fecha de un acontecimiento histórico)
}
const numTiposPregunta = Object.keys(TipoPregunta).length;

const ErroresTest = [
    "__ERR_TEST_OBJECT_INVALID", 
    "__ERR_TEST_ID_INVALID",
    "__ERR_ATTEMPT_TEST_ID_INVALID",
    "__ERR_QUESTION_ID_INVALID",
    "__ERR_QUESTION_INVALID",
    "__ERR_TEST_NAME_INVALID",
    "__ERR_TEST_DESCRIPTION_INVALID",
    "__ERR_MARK_INVALID", // Nota de test inválida
    "__ERR_COMPLETION_DATE_TEST_INVALID", // Fecha de realización inválida
    "__ERR_TEST_INFO_FETCH", // Error al recuperar la información del test del servidor
    "__ERR_QUESTIONS_FETCH", // Error al recuperar las preguntas del test del servidor
    "__ERR_ATTEMPT_FETCH" // Error al recuperar la información del intento del test del servidor
]

const CodigosErrorTest = (() => {
    let codigos = Array();
    let cod = -1;

    for (let i = 0; i < ErroresTest.length; i++) {
        codigos.push(cod);
        /*-- Incrementa el código de error (en valor negativo) --*/
        cod--;
    }
    return codigos;
})();
const CodigosErrorTestInversa = inversaArray(CodigosErrorTest);

const MensajesErrorTest = (() => {
    let mensajes = {};
    /*-- Añade mensajes a la lista de mensajes --*/
    mensajes[ErroresTest[0]] = {
        errorName: ErroresTest[0],
        errorCode: CodigosErrorTest[0],
        message: "Se esperaba un objeto de tipo Test."
    }
    mensajes[ErroresTest[1]] = {
        errorName: ErroresTest[1],
        errorCode: CodigosErrorTest[1],
        message: "Se esperaba un id numérico mayor de 0 como id de test."
    }
    mensajes[ErroresTest[2]] = {
        errorName: ErroresTest[2],
        errorCode: CodigosErrorTest[2],
        message: "No has especificado un id de intento de test válido."
    }
    mensajes[ErroresTest[3]] = {
        errorName: ErroresTest[3],
        errorCode: CodigosErrorTest[3],
        message: "Se ha introducido un id de pregunta inválido."
    }
    mensajes[ErroresTest[4]] = {
        errorName: ErroresTest[4],
        errorCode: CodigosErrorTest[4],
        message: "Se esperaba un objeto JSON como pregunta, o bien tiene una estructura incorrecta."
    }
    mensajes[ErroresTest[5]] = {
        errorName: ErroresTest[5],
        errorCode: CodigosErrorTest[5],
        message: "Se esperaba una cadena de texto con el nombre del test."
    }
    mensajes[ErroresTest[6]] = {
        errorName: ErroresTest[6],
        errorCode: CodigosErrorTest[6],
        message: "Se esperaba una cadena de texto con la descripción del test."
    }
    mensajes[ErroresTest[7]] = {
        errorName: ErroresTest[7],
        errorCode: CodigosErrorTest[7],
        message: "Se esperaba un número mayor entre 0 y 10 como nota de test."
    }
    mensajes[ErroresTest[8]] = {
        errorName: ErroresTest[8],
        errorCode: CodigosErrorTest[8],
        message: "Has especificado una fecha de realización que no es válida."
    }
    mensajes[ErroresTest[9]] = {
        errorName: ErroresTest[9],
        errorCode: CodigosErrorTest[9],
        message: "Se ha producido un error al intentar descargar la información del test del servidor."
    }
    mensajes[ErroresTest[10]] = {
        errorName: ErroresTest[10],
        errorCode: CodigosErrorTest[10],
        message: "Se ha producido un error al intentar descargar la información de las preguntas del servidor."
    }
    mensajes[ErroresTest[11]] = {
        errorName: ErroresTest[11],
        errorCode: CodigosErrorTest[11],
        message: "Se ha producido un error al intentar descargar la información del intento del test del servidor."
    }

    //
    return mensajes;
})();

/*====================================
            CLASES
======================================*/

class Test {
    /**
     * Constructor para crear un objeto de tipo test, que contendrá un test recogido de la BB.DD de la aplicación.
     * @param {object} preguntas - (Opcional) Objeto JSON que contiene las preguntas del test y respuestas a cada una de ellas, así como su respuesta correcta.
     * @param {string} nombre - (Opcional) El nombre del test.
     * @param {string} descripcion - (Opcional) La descripción del test.
     * @param {string} idMateria - (Opcional) Especifica la materia a la que pertenece el test. El índice es el del array de Materias del fichero MateriaModel.js
     * 
     */
    constructor(preguntas = null, nombre = null, descripcion = null, idMateria = null) {
        /*====================================================
              Define todos los atributos de la clase
        =====================================================*/
        this.idTest = null; // (number) (este dato se settea solo desde el método downloadInfoAboutTestByIdTest o desde el método downloadQuestionsByIdTest, es decir, solo cuando se recupera de la BB.DD)
        this.length = null; // (number) (este dato se incrementa y se disminuye desde los métodos addPregunta y removePregunta, métodos que pueden ser llamados para crear tests, o ser llamados desde la función downloadQuestionsByIdTest)
        this.preguntas = null; // (array de objetos JSON) (se rescatan de la BB.DD con el método downloadQuestionsByIdTest, o bien se pueden crear, modificar y eliminar con métodos específicos para ello)

        this.nombreTest = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.descripcion = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.numeroVisitas = null; // (number) (solo se rescata de la BB.DD)

        this.idUsuarioCreador = null; // (number) (se rescata de la BB.DD / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)
        this.nombreUsuarioCreador = null; // (string) (se rescata de la BB.DD / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)
        this.fechaCreacion = null; // (Date) (se rescata de la BB.DD / se asigna con el setter (que solamente permite asignar la fecha actual) desde el controlador)

        this.idMateria = null; // (number) (valor basado en los índices del array de Materias de MateriaModel.js) (se asigna con el setter desde el controlador en función de las materias que se recuperen desde MateriaModel.js, cuando el usuario esté creando un test en el creador de tests)
        this.nombreMateria = null; // (string) (se asigna con el setter de idMateria)

        this.idUsuarioRealizador = null; // (number) (se rescata de la BB.DD desde el servidor / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)
        this.respuestas = null; // (array de objetos JSON) (se rescatan de la BB.DD / se van creando/modificando/eliminando respuestas con los métodos addRespuesta/modifyRespuesta/)
        this.dificultad = null; // To do
        this.modalidad = null; // To do
        this.tiempoInicio = null; // To do: guarda una marca temporal de cuándo se inició el test.
        this.tiempoFin = null; // To do: guarda una marca temporal de cuándo se terminó el test.
        this.nota = null; // (number) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.fechaRealizacion = null; // (Date) (se rescata de la BB.DD / se asigna con el setter desde el controlador)

        /*===========================================
                Rellena todos los parámetros
        ============================================*/
        this.preguntas = Array();
        this.respuestas = Array();
        this.nombreTest = "";
        this.descripcion = "";
        this.nombreMateria = "";
        this.setFechaCreacion();
        /*-- Rellena los atributos de preguntas y size --*/
        if (preguntas instanceof Array) {
            this.preguntas = preguntas;
            this.size = preguntas.length;
        } else {
            this.size = 0;
        }

        /*-- Rellena los atributos en función de los parámetros que reciba el constructor --*/
        if (this.validaCadenas(nombre)) {
            this.nombreTest = nombre;
        }
        if (this.validaCadenas(descripcion)) {
            this.descripcion = descripcion;
        }
        if (validaIdMateria(idMateria)) {
            this.idMateria = idMateria;
        }
    }

    /**
     * Método genérico que sirve para validar ID's de la BB.DD.
     * En qué se usa:
     * - idTest
     * - idIntentoTest
     * @param {number} idBD - Especifica el ID de la tabla de la BB.DD que sea.
     */
    validaIdBD(idBD) {
        if (typeof (idBD) != "number") {
            return false;
        }
        if (idBD < 1) {
            return false;
        }
        return true;
    }

    /**
     * Método que valida un id de pregunta. El índice que valida es el del array de preguntas, no el del ID en la BB.DD.
     * @param {number} idPregunta - Especifica el id de la pregunta (índice del array interno).
     */
    validaIdPregunta(idPregunta) {
        if (typeof (idPregunta) != "number" || idPregunta < 0 || idPregunta >= this.preguntas.length) {
            return false;
        }
        return true;
    }

    /**
     * Método que valida un objeto JSON que contiene los datos de una pregunta.
     * @param {object} preguntaJSON - Especifica un objeto literal JSON con los datos de una pregunta.
     */
    validaPregunta(preguntaJSON) {
        /*-- Realiza las validaciones --*/
        if (typeof (preguntaJSON) != "object") {
            return false;
        }
        const datos = Object.entries(preguntaJSON);
        console.log(datos);
        /*-- Comprueba que la estructura sea la correcta --*/
        if (datos[0][0] != "id") {
            return false;
        }
        if (datos[1][0] != "id_test") {
            return false;
        }
        if (datos[2][0] != "tipo_pregunta") {
            return false;
        }
        if (datos[3][0] != "nombre_pregunta") {
            return false;
        }
        if (datos[4][0] != "datos_pregunta") {
            return false;
        }
        if (datos[5][0] != "retroalimentacion") {
            return false;
        }

        /*-- Comprueba que los datos introducidos en cada propiedad del JSON sean válidos de acuerdo al tipo de contenido que deberían tener --*/
        if (typeof(datos[2][1]) != "number" || pregunta.tipo_pregunta >= numTiposPregunta) {
            return false;
        }
        if (typeof(datos[3][1]) != "string" || datos[3][1] == "") {
            return false;
        }
        if (typeof(datos[4][1]) != "object") {
            return false;
        }
        if (typeof(datos[5][1]) != "string") {
            return false;
        }

        /*-- Comprueba los datos de la pregunta --*/
        const tipoPregunta = preguntaJSON.tipo_pregunta;
        const datosPregunta = Object.entries(preguntaJSON.datos_pregunta);
        switch (tipoPregunta) {
            case TipoPregunta.MULTIPLE_RESPONSE:
                /*-- Comprueba que la estructura sea la correcta --*/
                if (datosPregunta.length != 2) {
                    return false;
                }
                if (datosPregunta[0][0] != "respuestas") {
                    return false;
                }
                if (datosPregunta[1][0] != "respuesta_correcta") {
                    return false;
                }
                /*-- Comprueba los datos que contienen estas propiedades de la pregunta --*/
                if (datosPregunta[0][1] instanceof Array == false) {
                    return false;
                }
                if (typeof(datosPregunta[1][1]) != "string") {
                    return false;
                }
                break;
            case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE:
                
                break;
            case TipoPregunta.UNIQUE_RESPONSE:

                break;
            case TipoPregunta.FILL_IN_GAPS:

                break;
            case TipoPregunta.FILL_GAPS_GIVEN_ONE:

                break;
        }

        /*-- Todo correcto --*/
        return true;
    }

    /**
     * Método que valida un objeto JSON que contiene los datos de una pregunta.
     * @param {object} respuestaJSON - Especifica un objeto literal JSON con los datos de la respuesta.
     * @param {number} idPregunta - (Opcional) Especifica el id de la pregunta (índice del array interno). Para una validación más exhaustiva, es recomendable rellenar este argumento.
     */
    validaRespuesta(respuestaJSON, idPregunta = null) {
        if (typeof(respuestaJSON) != "object") {
            return false;
        }
        const keys = Object.keys(respuestaJSON);
        if (!keys.includes("id_pregunta") || !keys.includes("tipo_pregunta") || keys.includes("respuesta")) {
            return false;
        }
        if (idPregunta != null || typeof(idPregunta) != "number") {
            const pregunta = this.preguntas[idPregunta];
            if (!this.validaPregunta(pregunta)) return false;

            if (pregunta.tipo_pregunta < 1 || pregunta.tipo_pregunta >= numTiposPregunta) {
                return false;
            }

            /*-- Valida para cada tipo de pregunta --*/
            const respuesta = respuestaJSON.respuesta;
            let elementosRespuesta;
            switch (pregunta.tipo_pregunta) {
                case TipoPregunta.MULTIPLE_RESPONSE:
                    if (typeof(respuesta) != "string" || pregunta.datos_pregunta) return false;
                    break;
                case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE:
                    elementosRespuesta = Object.entries(respuesta);
                    
                    break;
                case TipoPregunta.UNIQUE_RESPONSE:

                    break;
                case TipoPregunta.FILL_IN_GAPS:

                    break;
                case TipoPregunta.FILL_GAPS_GIVEN_ONE:

                    break;
            }
        }
        return true;
    }

    /**
     * Método genérico que sirve para validar cadenas.
     * En qué se usa:
     * - nombreTest
     * - descripcionTest
     * - nombreMateria
     * @param {string} cadena - Especifica la cadena de texto a validar.
     */
    validaCadenas(cadena) {
        /*-- Realiza las validaciones --*/
        if (typeof (cadena) != "string") {
            return false;
        }
        return true;
    }

    /**
     * Método que sirve para validar la nota de un test.
     * @param {number} nota - Especifica la nota.
     */
    validaNota(nota) {
        /*-- Realiza las validaciones --*/
        if (typeof (nota) != "number" || nota < 0 || nota > 10) {
            return false;
        }
        return true;
    }

    /**
     * Método genérico que valida una fecha a partir de una cadena string. Este método intentará convertir la cadena a fecha, y verificará si la fecha no es posterior a la actual de hoy.
     * En qué se usa:
     * - fechaRealizacion
     * - fechaCreacion
     * @param {string} fecha - Especifica una cadena que contenga la fecha.
     */
    validaFechaByString(fecha) {
        let parseado;
        try {
            parseado = new Date(fecha);
            if (parseado > new Date()) {
                return false;
            }
            return true;
        } catch (error) {
            return false;
        }
    }

    /**
     * Método genérico que valida una fecha a partir de un timestamp.
     * @param {number} timestamp - Especifica el timestamp de la fecha.
     */
    validaFechaByTimestamp(timestamp) {
        const fechaActual = new Date().getTime();
        return timestamp <= fechaActual;
    }

    /**
     * Método genérico que valida una fecha a partir de un objeto de tipo Date.
     * @param {Date} fecha - Especifica el objeto de tipo Date.
     */
    validaFechaByDate(fecha) {
        if (fecha instanceof Date == false || fecha > new Date()) {
            return false;
        }
        return true;
    }

    /**
     * Devuelve el ID del test en la BB.DD.
     * @returns El ID del test en la BB.DD.
     */
    getIdTest() {
        return this.idTest;
    }

    /**
     * Devuelve el tamaño del test (nº de preguntas).
     * @returns El tamaño del test (nº de preguntas).
     */
    getSize() {
        return this.size;
    }

    /**
     * Devuelve la longitud del array interno de preguntas almacenadas en él.
     * @returns El número de preguntas almacenadas dentro del array interno de preguntas.
     */
    length() {
        return this.preguntas.length;
    }

    /**
     * Devuelve la pregunta especificada por ID (no el ID de la BB.DD, sino el del array interno donde se almacenan las preguntas), junto con sus respuestas y su respuesta correcta.
     * @param {number} idPregunta - Especifica el id de la pregunta (índice del array interno).
     */
    getPregunta(idPregunta) {
        return this.preguntas[idPregunta];
    }

    /**
     * Método para añadir una pregunta al test.
     * @param {object} pregunta - Especifica el objeto JSON que contiene la pregunta y sus datos, tal como se muestra en los example_*.json.
     */
    addPregunta(pregunta) {
        /*-- Realiza las validaciones --*/
        if (!this.validaPregunta(pregunta)) throw new Error();
        /*-- Realiza la operación --*/
        this.preguntas.push(pregunta);
        this.size++;
    }

    /**
     * Método que permite modificar una pregunta.
     * @param {number} idPregunta - Especifica el id de la pregunta (índice del array interno).
     * @param {object} pregunta - Especifica el objeto JSON que contiene la pregunta y sus datos, tal como se muestra en los example_*.json.
     */
    modifyPregunta(idPregunta, pregunta) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdPregunta(idPregunta)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        if (!this.validaPregunta(pregunta)) throw new Error(MensajesErrorTest["__ERR_QUESTION_INVALID"].message);
        /*-- Realiza la operación --*/
        this.preguntas[idPregunta] = pregunta;
    }

    /**
     * Método que sirve para eliminar una pregunta dentro del objeto test.
     * @param {number} idPregunta - Especifica el id de la pregunta (índice del array interno).
     */
    removePregunta(idPregunta) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdPregunta(idPregunta)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        /*-- Realiza la operación --*/
        this.preguntas.splice(idPregunta, 1);
        this.size--;
    }

    /**
     * Método que sirve para establecer el nombre del test.
     * @param {string} nombreTest - Especifica el nombre del test.
     */
    setNombreTest(nombreTest) {
        /*-- Realiza las validaciones --*/
        if (!this.validaCadenas(nombreTest)) throw new Error(MensajesErrorTest["__ERR_TEST_NAME_INVALID"].message);
        /*-- Realiza la operación --*/
        this.nombreTest = nombreTest;
    }

    /**
     * Método que devuelve el nombre del test.
     * @returns El nombre del test.
     */
    getNombreTest() {
        return this.nombreTest;
    }

    /**
     * Método que sirve para establecer la descripción del test.
     * @param {string} descripcionTest - Especifica la descripción del test.
     */
    setDescripcion(descripcionTest) {
        /*-- Realiza las validaciones --*/
        if (!this.validaCadenas(descripcionTest)) throw new Error(MensajesErrorTest["__ERR_TEST_DESCRIPTION_INVALID"].message);
        /*-- Realiza la operación --*/
        this.descripcion = descripcionTest;
    }

    /**
     * Método que devuelve la descripción del test.
     * @returns La descripción del test.
     */
    getDescripcion() {
        return this.descripcion;
    }

    /**
     * Método que devuelve el número de visitas que ha tenido del test.
     * @returns El número de visitas que ha tenido del test.
     */
    getNumeroVisitas() {
        return this.descripcion;
    }

    /**
     * Método que devuelve el ID del usuario creador del test.
     * @returns El ID del usuario creador del test.
     */
    getIDUsuarioCreador() {
        return this.idUsuarioCreador;
    }

    /**
     * Método que devuelve el nombre del usuario creador del test.
     * @returns El nombre del usuario creador del test.
     */
    getNombreUsuarioCreador() {
        return this.nombreUsuarioCreador;
    }

    /**
     * Método que sirve para establecer la fecha actual como fecha de creación del test.
     */
    setFechaCreacion() {
        let fecha = new Date();
        fecha.setUTCHours(fecha.getHours(), fecha.getMinutes(), fecha.getSeconds(), fecha.getMilliseconds());
        this.fechaCreacion = fecha;
    }

    /**
     * Método que devuelve la fecha de creación del test.
     */
    getFechaCreacion() {
        return this.fechaCreacion;
    }

    /**
     * Método que establece el id de la materia.
     * @param {number} idMateria - Especifica el ID de la materia a la que pertenece este test. Es el índice del array que hay en MateriaModel.js.
     */
    setIDMateria(idMateria) {
        /*-- Realiza las validaciones --*/
        if (!validaIdMateria(idMateria)) throw new Error(MensajesErrorMateria["__ERR_SUBJECT_ID_INVALID"].messages);
        /*-- Realiza la operación --*/
        this.idMateria = idMateria;
        this.nombreMateria = Materias[idMateria].nombre_materia;
    }

    /**
     * Método que devuelve el id de la materia a la que pertenece este test.
     * @returns El id de la materia a la que pertenece este test.
     */
    getIDMateria() {
        return this.idMateria;
    }

    // /**
    //  * Método que establece el nombre de la materia.
    //  * @param {number} nombreMateria - Especifica el nombre de la materia a la que pertenece este test.
    //  */
    // setNombreMateria(nombreMateria) {
    //     /*-- Realiza las validaciones --*/
    //     if (typeof(nombreMateria) != "string") {
    //         throw new Error("Se esperaba una cadena de texto con el nombre de la materia.");
    //     }
    //     /*-- Realiza la operación --*/
    //     this.nombreMateria = nombreMateria;
    // }

    /**
     * Método que devuelve el nombre de la materia a la que pertenece este test.
     * @returns El nombre de la materia a la que pertenece este test.
     */
    getNombreMateria() {
        return this.nombreMateria;
    }

    /**
     * Método que devuelve el id del usuario que ha hecho/está haciendo el test.
     * @returns El id del usuario que ha hecho/está haciendo el test.
     */
    getIDUsuarioRealizador() {
        return this.idUsuarioRealizador;
    }

    /**
     * Método que permite guardar la respuesta dada por el usuario a una pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se responde.
     * @param {object} respuesta - Especifica el objeto JSON con los datos de la respuesta dada por el usuario.
     */
    setRespuesta(indice, respuesta) {
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        
    }

    removeRespuesta(indice) {

    }

    /**
     * Método que establece la nota que está sacando el usuario en el test.
     * @param {number} nota - Especifica la nota que está sacando el usuario en el test.
     */
    setNota(nota) {
        /*-- Realiza las validaciones --*/
        if (!this.validaNota(nota)) throw new Error(MensajesErrorTest["__ERR_MARK_INVALID"].message);
        /*-- Realiza la operación --*/
        this.nota = nota;
    }

    /**
     * Método que devuelve la nota que está sacando el usuario en el test.
     * @returns La nota que está sacando el usuario en el test.
     */
    getNota() {
        return this.nota;
    }

    /**
     * Método que devuelve la fecha de realización en la que el usuario ha hecho o está haciendo el test.
     * @returns La fecha de realización en la que el usuario ha hecho o está haciendo el test.
     */
    getFechaRealizacion() {
        return this.fechaRealizacion;
    }

    /**
     * Método que establece la fecha de realización en la que el usuario ha hecho o está haciendo el test.
     * @param {Date} fechaRealizacion - Especifica la fecha de realización en la que el usuario ha hecho o está haciendo el test.
     */
    setFechaRealizacion(fechaRealizacion) {
        /*-- Realiza las validaciones --*/
        if (!this.validaFechaByDate(fechaRealizacion)) throw new Error(MensajesErrorTest["__ERR_COMPLETION_DATE_TEST_INVALID"].message);
        /*-- Realiza la operación --*/
        this.fechaRealizacion = fechaRealizacion;
    }

    /**
     * @deprecated (Deprecado) Descarga información acerca del test.
     * 
     * Usa este nuevo método: {@link TestController.downloadInfoAboutTestByIdTest}
     * - Nombre test
     * - Descripcion
     * - Numero de preguntas
     * - Numero visitas
     * - Id usuario creador
     * - Nombre usuario creador
     * - Id materia
     * - Nombre materia
     * @param {number} idTest - Especifica el id del test.
     */
    downloadInfoAboutTestByIdTest(idTest) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdBD(idTest)) throw new Error(MensajesErrorTest["__ERR_TEST_ID_INVALID"].message);

        /*-- Obtiene los datos del servidor --*/
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_TEST, "GET", null, { id: idTest })
            .then(response => {
                // To do
            }).catch(error => {
                /*-- Descarta que haya dado error --*/
                throw new Error(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error.message}`);
            })
    }

    /**
     * @deprecated (Deprecado) Método que descarga del servidor las 10 siguientes preguntas (y sus respuestas).
     * 
     * Usa este nuevo método: {@link TestController.downloadQuestionsByIdTest}
     * @param {number} idTest - Especifica el id del test.
     * @throws {Error} Puede lanzar un error si no consigue descargar la información de las preguntas del servidor.
     */
    downloadQuestionsByIdTest(idTest) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdBD(idTest)) throw new Error(MensajesErrorTest["__ERR_TEST_ID_INVALID"].message);

        /*-- Obtiene los datos del servidor --*/
        // datos cabecera (sustituir segundo null): {id: idTest, pagina: 1}
        // pagina es un atributo que indica el nº de página que se está mostrando. Los tests se van cargando en páginas, por ejemplo, de 10 en 10 preguntas, para reducir la carga del servidor cuando se trate de tests muy largos.
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_API_PREGUNTAS, "GET", null, { id: idTest })

            .then(response => {
                response.forEach(pregunta => {
                    // if (this.idTest == null) {
                    //     this.idTest = response.id_test;
                    // }
                    // delete response.id_test;
                    this.idTest = idTest;

                    /*-- Agrega la pregunta al array de preguntas --*/
                    pregunta.datos_pregunta = JSON.parse(pregunta.datos_pregunta);
                    this.addPregunta(pregunta);
                });
            }).catch(error => {
                /*-- Descarta que haya dado error --*/
                throw new Error(`${MensajesErrorTest["__ERR_QUESTIONS_FETCH"].message} Mensaje de error: ${error.message}`);
            });
    }

    /**
     * @deprecated (Deprecado) Método que descarga del servidor (si existe) la información del usuario que ha realizado este intento del test.
     * 
     * Usa este nuevo método: {@link TestController.downloadInfoIntentoUsuario}
     * - this.idUsuarioRealizador
     * - this.idTest
     * - this.nota
     * - this.fecha_realizacion
     * - this.respuestas
     * Es decir, descarga su nota, dado un id intento de test.
     * @param {number} idIntentoTest Especifica el id del intento del test.
     */
    downloadInfoIntentoUsuario(idIntentoTest) {
        /*-- Descarta que el idUsuario no sea válido --*/
        if (!this.validaIdBD(idIntentoTest)) throw new Error(MensajesErrorTest["__ERR_ATTEMPT_TEST_ID_INVALID"].message);

        /*-- Creación de variables temporales --*/
        let nota = null;
        let idUsuario = null;
        let fechaRealizacion = null;

        /*-- Descarta que la info no exista en el servidor --*/
        // ... To do

        /*-- Descarga la nota y establece los datos en el objeto Test --*/
        this.idUsuarioRealizador = idUsuario;
        this.fechaRealizacion = fechaRealizacion;
        this.nota = nota;
    }
}

/*==========================================
        MÉTODOS ASOCIADOS AL MODELO (To do: han de ser creados nuevos métodos en el próximo push para que concuerde con los nuevos tipos de preguntas que añadí en el último push)
===========================================*/

/**
 * Función para crear un test random con múltiples respuestas, con el único fin de realizar pruebas mientras no se tenga implementada la parte del lado del servidor.
 * @param {number} nPreguntas Especifica el numero de preguntas que quieres que tenga el test random.
 */
function crearTestMultiplesRespuestasRandom(nPreguntas) {
    /*-- Creación de variables --*/
    let test;
    let preguntas = Array();
    let respuestas = Array("Respuesta A", "Respuesta B", "Respuesta C", "Respuesta D");

    /*-- Creación de las preguntas random --*/
    for (let i = 0; i < nPreguntas; i++) {
        preguntas.push(
            {
                "id_pregunta": i + 1,
                "id_test": utilities.Random.randomInt(),
                "tipo_pregunta": TipoPregunta.MULTIPLE_RESPONSE, // Valdria tambien MULTIPLE_RESPONSE_MULTIPLE_CHOICE
                "nombre_pregunta": "Formulación de la pregunta " + (i + 1),
                "datos_pregunta": {
                    "respuestas": respuestas,
                    "respuesta_correcta": respuestas[utilities.Random.randomInt(0, respuestas.length)]
                }
            }
        );
    }

    /*-- Creación del test --*/
    test = new Test(utilities.Random.randomInt(1, 100), preguntas);

    /*-- Devuelve el test creado --*/
    return test;
}

/**
 * Función para crear un test random con una única respuesta posible, con el único fin de realizar pruebas mientras no se tenga implementada la parte del lado del servidor.
 * @param {number} nPreguntas Especifica el número de preguntas que quieres que tenga el test random.
 * @returns Un test random de única respuesta posible (tiene que ser escrita).
 */
function crearTestRespuestaUnica(nPreguntas) {
    /*-- Creación de variables --*/
    let test;
    let preguntas = Array();
    let palabras = ["perro", "gato", "casa", "coche", "jardín", "libro"];

    /*-- Creación de las preguntas random --*/
    for (let i = 0; i < nPreguntas; i++) {
        preguntas.push(
            {
                "id_pregunta": i + 1,
                "id_test": Random.randomInt(),
                "nombre_pregunta": "Formulación de la pregunta " + (i + 1),
                datos_pregunta: {
                    respuesta: palabras[utilities.Random.randomInt(0, palabras.length)]
                }
            }
        );
    }

    /*-- Creación del test --*/
    test = new Test(utilities.Random.randomInt(1, 100), preguntas);

    /*-- Devuelve el test creado --*/
    return test;
}

/**
 * Función para crear un test random de tipo rellenar huecos (gaps), con el único fin de realizar pruebas mientras no se tenga implementada la parte del lado del servidor.
 * @param {number} nPreguntas Especifica el número de preguntas que quieres que tenga el test random.
 * @returns Un test random de única respuesta posible (tiene que ser escrita).
 */
function crearTestRellenarHuecos(nPreguntas) {
    /*-- Creación de variables --*/
    let test;
    let preguntas = Array();
    let palabras = ["perro", "gato", "casa", "coche", "jardín", "libro"];

    /*-- Creación de las preguntas random --*/
    for (let i = 0; i < nPreguntas; i++) {
        preguntas.push(
            {
                "id_pregunta": i + 1,
                "id_test": utilities.Random.randomInt(),
                "nombre_pregunta": "Formulación de la pregunta " + (i + 1),
                datos_pregunta: {
                    "Hueco 1": palabras[utilities.Random.randomInt(0, palabras.length)],
                    "Hueco 2": palabras[utilities.Random.randomInt(0, palabras.length)],
                    "Hueco 3": palabras[utilities.Random.randomInt(0, palabras.length)],
                    "Hueco 4": palabras[utilities.Random.randomInt(0, palabras.length)]
                }
            }
        );
    }

    /*-- Creación del test --*/
    test = new Test(utilities.Random.randomInt(1, 100), preguntas);

    /*-- Devuelve el test creado --*/
    return test;
}