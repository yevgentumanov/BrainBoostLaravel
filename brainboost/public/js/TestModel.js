/*=====================================
            IMPORTACIONES
 =====================================*/
import * as globals from './globals.json';
// import * as irregular from './example_rellenar_huecos.json';
import * as apij from './JSON/api_rest.js';
import * as utilities from './utilidades.js';

/*====================================
            ENUMERADOS
======================================*/
const TipoPregunta = {
    NONE: 0, // No se ha definido el tipo de pregunta
    MULTIPLE_RESPONSE: 1, // Múltiples respuestas, única opción correcta
    MULTIPLE_RESPONSE_MULTIPLE_CHOICE: 2, // Múltiples respuestas, de múltiple elección (varias respuestas correctas posibles)
    UNIQUE_RESPONSE: 3, // Escribir la respuesta en una caja de texto
    FILL_IN_GAPS: 4, // Rellenar huecos (hay que rellenarlos todos)
    FILL_GAPS_GIVEN_ONE: 5 // Rellenar huecos dado uno (Ejemplo: verbos irregulares)
}

/*====================================
            CLASES
======================================*/
export class Test {
    /**
     * Constructor para crear un objeto de tipo test, que contendrá un test recogido de la BB.DD de la aplicación.
     * @param {number} idTest (Opcional) Especifica el id del test en la BB.DD. Lo especificará el controlador, observando la "bandera" que dejaremos mediante PHP dentro del código fuente de la página web.
     * @param {object} preguntas (Opcional) Objeto JSON que contiene las preguntas del test y respuestas a cada una de ellas, así como su respuesta correcta.
     * @param {string} categoriaTest (Opcional) Especifica la categoría/materia a la que pertenece el test.
     * 
     */
    constructor(idTest = null, preguntas = null, categoriaTest = null) {
        /*====================================================
              Define todos los atributos de la clase
        =====================================================*/
        this.id_test = null; // (number) (se rescata de la BB.DD / se puede inventar desde el constructor con fines de pruebas internas del equipo de desarrollo, no se puede crear (cuando estemos creando un test mediante el creador de tests que desarrollaremos))
        this.length = null; // (number) (se rescata de la BB.DD / se rescata del objeto preguntas (cuando se esté creando un test con el creador de test que desarrollaremos))
        this.preguntas = null; // (array de objetos JSON) (se rescatan de la BB.DD / se pueden crear, modificar y eliminar con métodos específicos para ello)

        this.nombre_test = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.descripcion = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.numero_visitas = null; // (number) (solo se rescata de la BB.DD)

        this.id_usuario_creador = null; // (number) (se rescata de la BB.DD / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)
        this.nombre_usuario_creador = null; // (string) (se rescata de la BB.DD / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)

        this.id_materia = null; // (number) (se rescata de la BB.DD / se asigna con el setter desde el controlador, cuando el usuario esté creando un test en el creador de tests)
        this.nombre_materia = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador, cuando el usuario esté creando un test en el creador de tests)

        this.id_usuario = null; // (number) (se rescata de la BB.DD desde el servidor)
        this.nota = null; // (number) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.fecha_realizacion = null; // (Date) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        
        /*===========================================
                Rellena todos los parámetros
        ============================================*/
        /*-- Rellena los atributos en función de los parámetros que reciba el constructor --*/
        if (typeof(idTest) == "number") {
            /*-- Atributos del test en sí --*/
            this.id_test = idTest;
        }

        /*-- Rellena los atributos de preguntas y length --*/
        if (preguntas && typeof(preguntas) == "object" && preguntas instanceof Array) {
            this.preguntas = preguntas;
            this.length = preguntas.length;
        } else {
            this.length = 0;
        }
    }

    /**
     * Devuelve el ID del test en la BB.DD.
     * @returns El ID del test en la BB.DD.
     */
    getIdTest() {
        return this.id_test;
    }

    /**
     * Devuelve el tamaño del test (nº de preguntas).
     * @returns El tamaño del test (nº de preguntas).
     */
    getLength() {
        return this.length;
    }

    /**
     * Devuelve la pregunta especificada por ID (no el ID de la BB.DD, sino el del array interno donde se almacenan las preguntas), junto con sus respuestas y su respuesta correcta.
     * @param {number} idPregunta Especifica el id de la pregunta que quieres obtener.
     */
    getPregunta(idPregunta) {
        return this.preguntas[idPregunta];
    }

    /**
     * Método para añadir una pregunta al test.
     * @param {object} pregunta Especifica el objeto JSON que contiene la pregunta y sus datos, tal como se muestra en los example_*.json.
     */
    addPregunta(pregunta) {
        this.preguntas.push(pregunta);
        this.length++;
    }

    /**
     * Método que permite modificar una pregunta.
     * @param {number} idPregunta Especifica el id de la pregunta (se refiere al ID del array).
     * @param {object} pregunta Especifica el objeto JSON que contiene la pregunta y sus datos, tal como se muestra en los example_*.json.
     */
    modifyPregunta(idPregunta, pregunta) {
        this.preguntas[idPregunta] = pregunta;
    }

    /**
     * Método que sirve para eliminar una pregunta dentro del objeto test.
     * @param {number} idPregunta Especifica el id de la pregunta (id numérico para identificar dentro del array de preguntas).
     */
    removePregunta(idPregunta) {
        this.preguntas.splice(idPregunta, 1);
        this.length--;
    }

    /**
     * Método que sirve para establecer el nombre del test.
     * @param {string} nombreTest Especifica el nombre del test.
     */
    setNombreTest(nombreTest) {
        this.nombre_test = nombreTest;
    }

    /**
     * Método que devuelve el nombre del test.
     * @returns El nombre del test.
     */
    getNombreTest() {
        return this.nombre_test;
    }

    /**
     * Método que sirve para establecer la descripción del test.
     * @param {string} descripcionTest Especifica la descripción del test.
     */
    setDescripcion(descripcionTest) {
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
        return this.id_usuario_creador;
    }

    /**
     * Método que devuelve el nombre del usuario creador del test.
     * @returns El nombre del usuario creador del test.
     */
    getNombreUsuarioCreador() {
        return this.nombre_usuario_creador;
    }

    /**
     * Método que establece el id de la materia.
     * @param {number} idMateria Especifica el ID de la materia a la que pertenece este test.
     */
    setIDMateria(idMateria) {
        this.id_materia = idMateria;
    }

    /**
     * Método que devuelve el id de la materia a la que pertenece este test.
     * @returns El id de la materia a la que pertenece este test.
     */
    getIDMateria() {
        return this.id_materia;
    }

    /**
     * Método que establece el nombre de la materia.
     * @param {number} idMateria Especifica el nombre de la materia a la que pertenece este test.
     */
    setNombreMateria(nombreMateria) {
        this.nombre_materia = nombreMateria;
    }

    /**
     * Método que devuelve el nombre de la materia a la que pertenece este test.
     * @returns El nombre de la materia a la que pertenece este test.
     */
    getNombreMateria() {
        return this.nombre_materia;
    }

    /**
     * Método que devuelve el id del usuario que ha hecho/está haciendo el test.
     * @returns El id del usuario que ha hecho/está haciendo el test.
     */
    getIDUsuario() {
        return this.id_usuario;
    }

    /**
     * Método que establece la nota que está sacando el usuario en el test.
     * @param {number} idMateria Especifica la nota que está sacando el usuario en el test.
     */
    setNota(nombreMateria) {
        this.nombre_materia = nombreMateria;
    }

    /**
     * Método que devuelve la nota que está sacando el usuario en el test.
     * @returns La nota que está sacando el usuario en el test.
     */
    getNota() {
        return this.nota;
    }

    /**
     * Método que establece la fecha de realización en la que el usuario ha hecho o está haciendo el test.
     * @param {Date} fechaRealizacion Especifica lla fecha de realización en la que el usuario ha hecho o está haciendo el test.
     */
    setNota(fechaRealizacion) {
        this.fecha_realizacion = fechaRealizacion;
    }

    /**
     * Método que devuelve la fecha de realización en la que el usuario ha hecho o está haciendo el test.
     * @returns La fecha de realización en la que el usuario ha hecho o está haciendo el test.
     */
    getFechaRealizacion() {
        return this.fecha_realizacion;
    }

    /**
     * Descarga información acerca del test.
     * - Nombre test
     * - Descripcion
     * - Numero visitas
     * - Id usuario creador
     * - Nombre usuario creador
     * - Id materia
     * - Nombre materia
     */
    downloadInfoAboutTestByIdTest() {
        /*-- Obtiene los datos del servidor --*/
        apij.obtenerJSON(globals.constantes.HOST_NAME + globals.constantes.RUTA_TESTS, "GET", null, {idTest: this.id_test, diezPreguntasHasta: 10})
        .then(response => {
            // ... To do
        }).catch(error => {
            /*-- Descarta que haya dado error --*/
            throw new Error("Se ha producido un error al intentar descargar la información de las preguntas del servidor. Mensaje de error: " + error.message);
        })
    }

    /**
     * Método que descarga del servidor las 10 siguientes preguntas (y sus respuestas).
     * @throws {Error} Puede lanzar un error si no consigue descargar la información de las preguntas del servidor.
     */
    downloadQuestionsByIdTest() {
        // irregular[0].tabla_preguntas[0]['Forma base'] // Esta línea no sirve para nada, era solo una prueba, lo borraré

        /*-- Creación de un array de Tests --*/
        // let preguntas = Array(); // Aquí se almacenarán las preguntas del test que se recojan del servidor
    
        /*-- Obtiene los datos del servidor --*/
        apij.obtenerJSON(globals.constantes.HOST_NAME + globals.constantes.RUTA_PREGUNTAS, "GET", null, {idTest: this.id_test, diezPreguntasHasta: 10})
        /* diezPreguntasHasta es un parámetro que se le pasa al servidor para indicarle que, por ejemplo, si estamos en viendo las preguntas del 1-10 y queremos ver las siguientes 10,
        se lo especificamos diciéndole que diezPreguntasHasta = 20, porque serían 10 preguntas desde la pregunta número 10 (que es la última visible en la página hasta el momento) */
        .then(response => {
            this.preguntas.push(response); // Revisar a ver si está bien o no cuando esté implementada la parte del lado del servidor
        }).catch(error => {
            /*-- Descarta que haya dado error --*/
            throw new Error("Se ha producido un error al intentar descargar la información de las preguntas del servidor. Mensaje de error: " + error.message);
        });

        /*-- Devuelve el resultado de la variable tests (el controlador se encargará de verificar si esto ha devuelto realmente la lista de tests o un error) --*/
        // return tests; // Esto ya no hace falta
    }

    /**
     * Método que descarga del servidor (si existe) la información del usuario que ha realizado este intento del test.
     * Es decir, descarga su nota, dado un id de usuario y una fecha de realización (si existen).
     * @param {number} idUsuario Especifica el id del usuario que ha realizado el intento del test.
     * @param {Date} fechaRealizacion Especifica la fecha en la que el usuario realizó el intento del test.
     */
    downloadInfoIntentoUsuario(idUsuario, fechaRealizacion) {
        /*-- Descarta que el idUsuario no sea válido --*/
        if (!idUsuario || typeof(idUsuario) != "number") {
            return;
        }

        /*-- Descarta que la fechaRealizacion no sea válida --*/
        if (!fechaRealizacion || typeof(fechaRealizacion) != "object" || fechaRealizacion instanceof Date == false) {
            return;
        }

        /*-- Descarta que la info no exista en el servidor --*/
        let nota = null;
        // ... To do

        /*-- Descarga la nota y establece los datos en el objeto Test --*/
        this.id_usuario = idUsuario;
        this.fecha_realizacion = fechaRealizacion;
        this.nota = nota;
    }
}

/*==========================================
        MÉTODOS ASOCIADOS AL MODELO (han de ser creados nuevos métodos en el próximo push para que concuerde con los nuevos tipos de preguntas que añadí en el último push)
===========================================*/

/**
 * Función para crear un test random con múltiples respuestas, con el único fin de realizar pruebas mientras no se tenga implementada la parte del lado del servidor.
 * @param {number} nPreguntas Especifica el numero de preguntas que quieres que tenga el test random.
 */
export function crearTestMultiplesRespuestasRandom(nPreguntas) {
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
export function crearTestRespuestaUnica(nPreguntas) {
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
export function crearTestRellenarHuecos(nPreguntas) {
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
                    huecos: {
                        "Hueco 1": palabras[utilities.Random.randomInt(0, palabras.length)],
                        "Hueco 2": palabras[utilities.Random.randomInt(0, palabras.length)],
                        "Hueco 3": palabras[utilities.Random.randomInt(0, palabras.length)],
                        "Hueco 4": palabras[utilities.Random.randomInt(0, palabras.length)]
                    }
                }
            }
        );
    }

    /*-- Creación del test --*/
    test = new Test(utilities.Random.randomInt(1, 100), preguntas);

    /*-- Devuelve el test creado --*/
    return test;
}