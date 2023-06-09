/**
 * Fichero donde se implementa el modelo de datos que manejará el controlador.
 * @author Santiago
 * @version 24.05.2023
 */

/*===============================================
            ENUMERADOS Y CONSTANTES
=================================================*/

export const TipoPregunta = {
    NONE: 0, // No se ha definido el tipo de pregunta
    MULTIPLE_RESPONSE: 1, // Múltiples respuestas, única opción correcta
    MULTIPLE_RESPONSE_MULTIPLE_CHOICE: 2, // Múltiples respuestas, de múltiple elección (varias respuestas correctas)
    UNIQUE_RESPONSE: 3, // Escribir la respuesta en una caja de texto
    FILL_IN_GAPS: 4, // Rellenar huecos (hay que rellenarlos todos)
    FILL_GAPS_GIVEN_ONE: 5, // Rellenar huecos dado uno (Ejemplo: verbos irregulares)
    FILL_TABLE: 6 // Rellenar tabla
}
export const numTiposPregunta = Object.keys(TipoPregunta).length;

export const TipoModalidad = {
    ESTUDIAR: 1,
    PRACTICAR: 2,
    DESAFIO: 3,
    REVISAR: 4
}

export const TipoDificultad = {
    FACIL: 1,
    DIFICIL: 2
}

export const ErroresTest = [
    "__ERR_TEST_OBJECT_INVALID", 
    "__ERR_TEST_ID_INVALID",
    "__ERR_ATTEMPT_TEST_ID_INVALID",
    "__ERR_QUESTION_ID_INVALID",
    "__ERR_QUESTION_INVALID",
    "__ERR_RESPONSE_INVALID",
    "__ERR_TEST_NAME_INVALID",
    "__ERR_TEST_DESCRIPTION_INVALID",
    "__ERR_MARK_INVALID", // Nota de test inválida
    "__ERR_COMPLETION_DATE_TEST_INVALID", // Fecha de realización inválida
    "__ERR_TEST_INFO_FETCH", // Error al recuperar la información del test del servidor
    "__ERR_QUESTIONS_FETCH", // Error al recuperar las preguntas del test del servidor
    "__ERR_ATTEMPT_FETCH", // Error al recuperar la información del intento del test del servidor
    "__ERR_MODALITY",
    "__ERR_DIFFICULTY"
]

export const CodigosErrorTest = (() => {
    let codigos = Array();
    let cod = -1;

    for (let i = 0; i < ErroresTest.length; i++) {
        codigos.push(cod);
        /*-- Incrementa el código de error (en valor negativo) --*/
        cod--;
    }
    return codigos;
})();
export const CodigosErrorTestInversa = inversaArray(CodigosErrorTest);

export const MensajesErrorTest = (() => {
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
    },
    mensajes[ErroresTest[5]] = {
        errorName: ErroresTest[5],
        errorCode: CodigosErrorTest[5],
        message: "Se esperaba una respuesta válida con el formato JSON."
    },
    mensajes[ErroresTest[6]] = {
        errorName: ErroresTest[6],
        errorCode: CodigosErrorTest[6],
        message: "Se esperaba una cadena de texto con el nombre del test."
    }
    mensajes[ErroresTest[7]] = {
        errorName: ErroresTest[7],
        errorCode: CodigosErrorTest[7],
        message: "Se esperaba una cadena de texto con la descripción del test."
    }
    mensajes[ErroresTest[8]] = {
        errorName: ErroresTest[8],
        errorCode: CodigosErrorTest[8],
        message: "Se esperaba un número mayor entre 0 y 10 como nota de test."
    }
    mensajes[ErroresTest[9]] = {
        errorName: ErroresTest[9],
        errorCode: CodigosErrorTest[9],
        message: "Has especificado una fecha de realización que no es válida."
    }
    mensajes[ErroresTest[10]] = {
        errorName: ErroresTest[10],
        errorCode: CodigosErrorTest[10],
        message: "Se ha producido un error al intentar descargar la información del test del servidor."
    }
    mensajes[ErroresTest[11]] = {
        errorName: ErroresTest[11],
        errorCode: CodigosErrorTest[11],
        message: "Se ha producido un error al intentar descargar la información de las preguntas del servidor."
    }
    mensajes[ErroresTest[12]] = {
        errorName: ErroresTest[12],
        errorCode: CodigosErrorTest[12],
        message: "Se ha producido un error al intentar descargar la información del intento del test del servidor."
    },
    mensajes[ErroresTest[13]] = {
        errorName: ErroresTest[13],
        errorCode: CodigosErrorTest[13],
        message: "La modalidad de test especificada no es válida."
    },
    mensajes[ErroresTest[14]] = {
        errorName: ErroresTest[14],
        errorCode: CodigosErrorTest[14],
        message: "La dificultad de test especificada no es válida."
    }

    return mensajes;
})();

/*====================================
            CLASES
======================================*/

export class Test {
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
        this.size = null; // (number) (este dato se incrementa y se disminuye desde los métodos addPregunta y removePregunta, métodos que pueden ser llamados para crear tests, o ser llamados desde la función downloadQuestionsByIdTest)
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
        this.dificultad = null;
        this.modalidad = null;
        this.tiempoInicio = null;
        this.tiempoFin = null;
        this.intento = null; // (number) almacenará el nº del intento del test realizado por el usuario que ha sido descargado desde el servidor.
        // this.intentos = null; // To do (getters, setters y obtencion del servidor): (number) almacenará el nº de intentos realizado por el usuario (solo se puede rescatar de la BB.DD)
        this.nota = null; // (number) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.notasPreguntas = null // (array) Guarda las notas individuales por cada pregunta
        this.fechaRealizacion = null; // (Date) (se rescata de la BB.DD / se asigna con el setter desde el controlador)

        /*================================================================
                Rellena todos los parámetros (con valores por defecto)
        =================================================================*/
        this.preguntas = Array();
        this.respuestas = Array();
        this.notasPreguntas = Array();
        this.nombreTest = "";
        this.descripcion = "";
        this.nombreMateria = "";
        this.setFechaCreacion();
        this.modalidad = TipoModalidad.PRACTICAR;
        this.dificultad = TipoDificultad.FACIL;

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
     * - intento
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
        
        /*-- Comprueba que la estructura sea la correcta --*/
        if ("id" in preguntaJSON == false) {
            return false;
        }
        if ("id_test" in preguntaJSON == false) {
            return false;
        }
        if ("tipo_pregunta" in preguntaJSON == false) {
            return false;
        }
        if ("nombre_pregunta" in preguntaJSON == false) {
            return false;
        }
        if ("datos_pregunta" in preguntaJSON == false) {
            return false;
        }
        if ("retroalimentacion" in preguntaJSON == false) {
            return false;
        }

        /*-- Comprueba que los datos introducidos en cada propiedad del JSON sean válidos de acuerdo al tipo de contenido que deberían tener --*/
        if (typeof(preguntaJSON.tipo_pregunta) != "number" || preguntaJSON.tipo_pregunta <= 0 || preguntaJSON.tipo_pregunta >= numTiposPregunta) {
            return false;
        }
        if (typeof(preguntaJSON.nombre_pregunta) != "string" || preguntaJSON.nombre_pregunta == "") {
            return false;
        }
        if (typeof(preguntaJSON.datos_pregunta) != "object") {
            return false;
        }
        if (typeof(preguntaJSON.retroalimentacion) != "string" && preguntaJSON.retroalimentacion != null) {
            return false;
        }

        /*-- Comprueba los datos de la pregunta --*/
        // const tipoPregunta = ;
        switch (preguntaJSON.tipo_pregunta) {
            case TipoPregunta.MULTIPLE_RESPONSE: // Tipo 1
            case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE: // Tipo 2
                /*-- Comprueba que la estructura sea la correcta --*/
                if ("respuestas" in preguntaJSON.datos_pregunta == false) {
                    return false;
                }
                if ("respuestas_correctas" in preguntaJSON.datos_pregunta == false) {
                    return false; // To do en la BB.DD: respuesta_correcta => respuestas_correctas
                }
                /*-- Comprueba los datos que contienen estas propiedades de la pregunta --*/
                if (preguntaJSON.datos_pregunta.respuestas instanceof Array == false) {
                    return false;
                }
                if (preguntaJSON.tipo_pregunta == TipoPregunta.MULTIPLE_RESPONSE) {
                    if (typeof(preguntaJSON.datos_pregunta.respuestas_correctas) != "string") {
                        return false; // To do en la BB.DD: respuesta_correcta => respuestas_correctas
                    }
                } else if (preguntaJSON.tipo_pregunta == TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE) {
                    if (preguntaJSON.datos_pregunta.respuestas_correctas instanceof Array == false) {
                        return false; // To do en la BB.DD: respuesta_correcta => respuestas_correctas
                    }
                }
                break;
            case TipoPregunta.UNIQUE_RESPONSE: // Tipo 3
                /*-- Comprueba que la estructura sea la correcta --*/
                if ("respuesta" in preguntaJSON.datos_pregunta == false) {
                    return false;
                }
                /*-- Comprueba que no tengan retroalimentación --*/
                if (typeof(preguntaJSON.retroalimentacion) != "string" || preguntaJSON.retroalimentacion.length > 0) { // To do: verificar si finalmente esto será así
                    return false;
                }
                /*-- Comprueba los datos que contienen estas propiedades de la pregunta --*/
                if (typeof(preguntaJSON.datos_pregunta.respuesta) != "string") {
                    return false;
                }
                break;
            case TipoPregunta.FILL_IN_GAPS: // Tipo 4
            case TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
            case TipoPregunta.FILL_TABLE: // Tipo 6
                /*-- Comprueba que no tengan retroalimentación --*/
                if (preguntaJSON.retroalimentacion != null && preguntaJSON.retroalimentacion.length > 0) {
                    return false;
                }

                /*-- Constantes para realizar la validación --*/
                const regex = /^\$\{((\d+):(.*?))\}$/g;
                const regexEnCualquierParte = /\$\{((\d+):(.*?))\}/g; // ${1:hueco1}, esto es: pregunta 1, hueco 1
                const datosPregunta = Object.entries(preguntaJSON.datos_pregunta);
                
                /*-- Comprueba si existen los huecos en el enunciado de la preguntaJSON --*/
                let huecosEnunciado = Array();

                if (preguntaJSON.tipo_pregunta != TipoPregunta.FILL_IN_GAPS) { // Si no es de tipo 4
                    const enunciadoTieneHuecos = regexEnCualquierParte.test(preguntaJSON.nombre_pregunta); // bandera boolean
                    if (enunciadoTieneHuecos) return false; // Da error si el enunciado contiene huecos, ya que no es de tipo 4
                } else { // Es de tipo 4 (tiene huecos en el enunciado)
                    /*-- Si existen los huecos, comprueba que cumplan con la expresión regular y que coincidan con los que hay almacenados en datos_pregunta --*/
                    let aparicion;
                    while ((aparicion = regex.exec(pregunta)) !== null) {
                        huecosEnunciado.push(aparicion);
                    }
                }

                /*-- Comprueba los datos que contienen estas propiedades de la pregunta --*/
                for (let i = 0; i < datosPregunta.length; i++) {
                    /*-- Variables --*/
                    const element = datosPregunta[i];
                    
                    /*-- Valida si los huecos son válidos y su contenido es number o string --*/
                    const validacionHuecos = regex.test(element[0]);
                    if (!validacionHuecos) {
                        return false;
                    }
                    if (typeof(element[1]) != "string" && typeof(element[1]) != "number") {
                        return false;
                    }

                    /*-- Verifica que existan los huecos en el enunciado de la preguntaJSON --*/
                    if (preguntaJSON.tipo_pregunta == TipoPregunta.FILL_IN_GAPS && huecosEnunciado.length <= 0) {
                        return false;
                    }

                    /*-- Comprueba si los huecos coinciden con los de datosPregunta (las respuestas posibles) --*/
                    if (huecosEnunciado[i] != element[0]) {
                        return false;
                    }
                }
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

        /*-- Realiza una validación más exhaustiva en caso de que se especifique un idPregunta por parámetro --*/
        if (idPregunta != null && typeof(idPregunta) == "number") {
            /*-- Comprueba que el id de pregunta exista dentro del array de preguntas --*/
            if (!this.validaIdPregunta()) return false;
            /*-- Obtiene la pregunta --*/
            const pregunta = this.preguntas[idPregunta];
            /*-- Verifica que la pregunta sea válida --*/
            if (!this.validaPregunta(pregunta)) return false;

            /*-- Verifica que el tipo de pregunta sea válido --*/
            if (pregunta.tipo_pregunta < 1 || pregunta.tipo_pregunta >= numTiposPregunta) {
                return false;
            }

            // prueba.includes(pregunta.datos_pregunta.respuestas.)
            /*-- Valida para cada tipo de pregunta --*/
            let elementosRespuesta;

            switch (pregunta.tipo_pregunta) {
                                    // respuestaJSON.forEach(element => {
                    //     if (typeof(element) != "string" || pregunta.datos_pregunta.respuestas.includes(element)) {
                    //         return false;
                    //     }
                    // });
                case TipoPregunta.MULTIPLE_RESPONSE:
                case TipoPregunta.MULTIPLE_RESPONSE_MULTIPLE_CHOICE:
                    /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
                    if (compareArraysWithoutOrder(respuestaJSON, pregunta.datos_pregunta.respuestas).length == 0) {
                        return false;
                    }
                    break;
                case TipoPregunta.UNIQUE_RESPONSE:
                    /*-- Comprueba si la respuesta dada por el usuario es de tipo string o number --*/
                    if (typeof(respuestaJSON[0]) != "string" && typeof(respuestaJSON[0]) != "number") return false;
                    break;
                case TipoPregunta.FILL_IN_GAPS: // Tipo 4
                case TipoPregunta.FILL_GAPS_GIVEN_ONE: // Tipo 5
                case TipoPregunta.FILL_TABLE: // Tipo 6
                    /*-- Convierte datos_pregunta en un Array iterable --*/
                    const datosPregunta = Object.entries(preguntaJSON.datos_pregunta);
                    let arrDatosPregunta = [];
                    for (const key in datosPregunta) {
                        if (Object.hasOwnProperty.call(datosPregunta, key)) {
                            let element = {};
                            element[key] = datosPregunta[key];
                            arrDatosPregunta.push(element);
                        }
                    }
                    if (pregunta.tipo_pregunta == FILL_IN_GAPS) { // Tipo 4
                        /*-- Comprueba si la respuesta que ha dado el usuario coincide con alguna de las respuestas posibles para la pregunta --*/
                        if (compareArraysWithoutOrder(respuestaJSON, arrDatosPregunta,
                            (x, y) => comparar(x, y)).length != datosPregunta.length) return false;
                    } else { // Tipos 5 y 6
                        if (compareArraysInOrder(respuestaJSON, arrDatosPregunta,
                            (x, y) => comparar(x, y)).length ) return false;
                    }
                    
                    break;
            }
        }
        return true;
    }

    /**
     * Método que permite validar si el tipo de modalidad elegido es correcto.
     * @param {number} modalidad - Especifica el valor de modalidad elegida para la realización del test.
     */
    validaModalidad(modalidad) {
        /*-- Realiza las validaciones --*/
        if (typeof(modalidad) != "number") {
            return false;
        }
        const valores = Object.values(TipoModalidad);
        if (modalidad in valores == false) {
            return false;
        }
        return true;
    }

    /**
     * Método que permite validar si el tipo de dificultad elegido es correcto.
     * @param {number} dificultad - Especifica el valor de dificultad elegida para la realización del test.
     */
    validaDificultad(dificultad) {
        /*-- Realiza las validaciones --*/
        if (typeof(dificultad) != "number") {
            return false;
        }
        const valores = Object.values(TipoDificultad);
        if (dificultad in valores == false) {
            return false;
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
        if (this.preguntas.length < this.size) {
            this.preguntas.push(pregunta);
        } else {
            this.preguntas.push(pregunta);
            this.size++;
        }
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
     * Método que devuelve las respuestas dadas por el usuario que han sido almacenadas.
     */
    getRespuestas() {
        return this.respuestas;
    }

    /**
     * Método que devuelve la respuesta dada por el usuario a una determinada pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se quiere conocer su respuesta.
     */
    getRespuestaByQuestion(indice) {
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        return this.respuestas[indice];
    }

    /**
     * Método que permite guardar la respuesta dada por el usuario a una pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se responde.
     * @param {object} respuesta - Especifica el objeto JSON con los datos de la respuesta dada por el usuario.
     */
    setRespuesta(indice, respuesta) {
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        if (!this.validaRespuesta(respuesta)) throw new Error(MensajesErrorTest["__ERR_RESPONSE_INVALID"].message);

        this.respuestas[indice] = respuesta;
    }

    /**
     * Método que sirve para eliminar la respuesta a una pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se desea eliminar la respuesta.
     */
    removeRespuesta(indice) {
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        this.respuestas[indice] = null; // To do: ver si se puede eliminar de otra forma que no sea asignándole null
    }

    /**
     * Método que devuelve la nota que está sacando el usuario en el test.
     * @returns La nota que está sacando el usuario en el test.
     */
    getNota() {
        return this.nota;
    }

    /**
     * Método que establece la nota que está sacando el usuario en el test.
     * @param {number} nota - Especifica la nota que está sacando el usuario en el test.
     */
    // setNota(nota) {
    //     /*-- Realiza las validaciones --*/
    //     if (!this.validaNota(nota)) throw new Error(MensajesErrorTest["__ERR_MARK_INVALID"].message);
    //     /*-- Realiza la operación --*/
    //     this.nota = nota;
    // }

    /**
     * Método que devuelve la nota que está sacando el usuario en la pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se responde.
     * @returns La nota que está sacando el usuario en el test.
     */
    getNotaPregunta(indice) {
        return this.notasPreguntas[indice];
    }

    /**
     * Método que permite guardar la nota sacada por el usuario en la pregunta, en función de su respuesta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se responde.
     * @param {object} nota - Especifica la nota que está sacando el usuario en la pregunta.
     */
    setNotaPregunta(indice, nota) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        if (!this.validaNota(nota)) throw new Error(MensajesErrorTest["__ERR_MARK_INVALID"].message);
        /*-- Realiza la operación --*/
        if (typeof(this.notasPreguntas[indice]) == "number") {
            this.nota -= this.notasPreguntas[indice];
        }
        this.notasPreguntas[indice] = nota;
        if (typeof(nota) == "number") {
            this.nota += nota;
        }
    }

    /**
     * Método que sirve para eliminar la nota de una pregunta.
     * @param {number} indice - Especifica el índice de la pregunta sobre la que se desea eliminar la nota.
     */
    removeNotaPregunta(indice) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdPregunta(indice)) throw new Error(MensajesErrorTest["__ERR_QUESTION_ID_INVALID"].message);
        /*-- Realiza la operación --*/
        this.nota -= this.notasPreguntas[indice];
        this.notasPreguntas[indice] = null; // To do: ver si se puede eliminar de otra forma que no sea asignándole null
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
     * Método que permite establecer una modalidad de test.
     * @param {number} modalidad - Especifica el valor de modalidad elegida para la realización del test.
     */
    setModalidad(modalidad) {
        /*-- Realiza las validaciones --*/
        if (!this.validaModalidad(fechaRealizacion)) throw new Error(MensajesErrorTest["__ERR_MODALITY"].message);

        /*-- Realiza la operación --*/
        this.modalidad = modalidad;
    }

    /**
     * Getter de la modalidad del test.
     * @returns La modalidad del test.
     */
    getModalidad() {
        return this.modalidad;
    }

    /**
     * Método que permite establecer una dificultad de test.
     * @param {number} dificultad - Especifica el valor de dificultad elegida para la realización del test.
     */
    setDificultad(dificultad) {
        /*-- Realiza las validaciones --*/
        if (!this.validaDificultad(fechaRealizacion)) throw new Error(MensajesErrorTest["__ERR_DIFFICULTY"].message);

        /*-- Realiza la operación --*/
        this.dificultad = dificultad;
    }

    /**
     * Getter de la dificultad del test.
     * @returns La dificultad del test.
     */
    getDificultad() {
        return this.dificultad;
    }

    /**
     * Getter del número de intento correspondiente al test que ha realizado el usuario.
     */
    getIntento() {
        return this.intento;
    }

    /**
     * Setter para establecer el nº de intento del test.
     * @param {Number} intento - Especifica el nº de intento del test.
     */
    setIntento(intento) {
        /*-- Realiza las validaciones --*/
        if (!this.validaIdBD(intento)) throw new Error(MensajesErrorTest["__ERR_ATTEMPT_TEST_ID_INVALID"].message);
        /*-- Realiza la operación --*/
        this.intento = intento;
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