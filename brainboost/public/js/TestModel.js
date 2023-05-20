/*=====================================
            IMPORTACIONES
 =====================================*/
// import * as globals from './globals.json';
// import * as irregular from './example_rellenar_huecos.json';
// import * as apij from './JSON/api_rest.js';
// import * as utilities from './utilidades.js';

/*====================================
            ENUMERADOS
======================================*/

const TipoPregunta = {
    NONE: 0, // No se ha definido el tipo de pregunta
    MULTIPLE_RESPONSE: 1, // Múltiples respuestas, única opción correcta
    MULTIPLE_RESPONSE_MULTIPLE_CHOICE: 2, // Múltiples respuestas, de múltiple elección (varias respuestas correctas)
    UNIQUE_RESPONSE: 3, // Escribir la respuesta en una caja de texto
    FILL_IN_GAPS: 4, // Rellenar huecos (hay que rellenarlos todos)
    FILL_GAPS_GIVEN_ONE: 5 // Rellenar huecos dado uno (Ejemplo: verbos irregulares)
}

/*====================================
            CLASES
======================================*/

class Test {
    /**
     * Constructor para crear un objeto de tipo test, que contendrá un test recogido de la BB.DD de la aplicación.
     * @param {object} preguntas - (Opcional) Objeto JSON que contiene las preguntas del test y respuestas a cada una de ellas, así como su respuesta correcta.
     * @param {string} nombre - (Opcional) El nombre del test.
     * @param {string} descripcion (Opcional) La descripción del test.
     * @param {string} idMateria - (Opcional) Especifica la materia a la que pertenece el test.
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

        this.idMateria = null; // (number) (valor basado en los índices del array de Materias de MateriaModel.js) (se asigna con el setter desde el controlador en función de las materias que se recuperen desde MateriaModel.js, cuando el usuario esté creando un test en el creador de tests)
        this.nombreMateria = null; // (string) (se rescata de la BB.DD / se asigna con el setter desde el controlador en función de las materias que se recuperen desde MateriaModel.js, cuando el usuario esté creando un test en el creador de tests)

        this.idUsuarioRealizador = null; // (number) (se rescata de la BB.DD desde el servidor / no se puede asignar de otra forma, cuando un usuario cree un test desde el creador de tests, será desde el backend desde donde se reciba el id del usuario y se le asignará allí antes de guardar los datos en la BB.DD. Pero desde el frontend partirá con valor null)
        this.nota = null; // (number) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        this.fechaRealizacion = null; // (Date) (se rescata de la BB.DD / se asigna con el setter desde el controlador)
        
        /*===========================================
                Rellena todos los parámetros
        ============================================*/
        this.preguntas = Array();
        /*-- Rellena los atributos de preguntas y size --*/
        if (preguntas instanceof Array) {
            this.preguntas = preguntas;
            this.size = preguntas.length;
        } else {
            this.size = 0;
        }

        /*-- Rellena los atributos en función de los parámetros que reciba el constructor --*/
        if (typeof(nombre) == "string") {
            this.nombreTest = nombre;
        }
        if (typeof(descripcion) == "string") {
            this.descripcion = descripcion;
        }
        if (typeof(idMateria) == "number" && idMateria >= 0 && idMateria < Materias.length) {
            this.idMateria = idMateria;
        }
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
     */
    length() {
        return this.preguntas.length;
    }

    /**
     * Devuelve la pregunta especificada por ID (no el ID de la BB.DD, sino el del array interno donde se almacenan las preguntas), junto con sus respuestas y su respuesta correcta.
     * @param {number} idPregunta - Especifica el id de la pregunta que quieres obtener.
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
        if (typeof(pregunta) != "object") {
            throw new Error("Se esperaba un objeto JSON como pregunta.")
        }
        /*-- Realiza la operación --*/
        this.preguntas.push(pregunta);
        this.size++;
    }

    /**
     * Método que permite modificar una pregunta.
     * @param {number} idPregunta - Especifica el id de la pregunta (se refiere al ID del array).
     * @param {object} pregunta - Especifica el objeto JSON que contiene la pregunta y sus datos, tal como se muestra en los example_*.json.
     */
    modifyPregunta(idPregunta, pregunta) {
        /*-- Realiza las validaciones --*/
        if (typeof(idPregunta) != "number" || idPregunta < 1) {
            throw new Error("Se esperaba un id numérico mayor de 0 como id de pregunta.");
        }
        if (typeof(pregunta) != "object") {
            throw new Error("Se esperaba un objeto JSON como pregunta.");
        }
        /*-- Realiza la operación --*/
        this.preguntas[idPregunta] = pregunta;
    }

    /**
     * Método que sirve para eliminar una pregunta dentro del objeto test.
     * @param {number} idPregunta - Especifica el id de la pregunta (id numérico para identificar dentro del array de preguntas).
     */
    removePregunta(idPregunta) {
        /*-- Realiza las validaciones --*/
        if (typeof(idPregunta) != "number" || idPregunta < 1) {
            throw new Error("Se esperaba un id numérico mayor de 0 como id de pregunta.");
        }
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
        if (typeof(nombreTest) != "string") {
            throw new Error("Se esperaba una cadena de texto con el nombre del test.");
        }
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
        if (typeof(descripcionTest) != "string") {
            throw new Error("Se esperaba una cadena de texto con la descripción del test.");
        }
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
     * Método que establece el id de la materia.
     * @param {number} idMateria - Especifica el ID de la materia a la que pertenece este test.
     */
    setIDMateria(idMateria) {
        /*-- Realiza las validaciones --*/
        if (typeof(idMateria) != "number" || idMateria < 1) {
            throw new Error("Se esperaba un id numérico mayor de 0 como id de materia.");
        }
        /*-- Realiza la operación --*/
        this.idMateria = idMateria;
    }

    /**
     * Método que devuelve el id de la materia a la que pertenece este test.
     * @returns El id de la materia a la que pertenece este test.
     */
    getIDMateria() {
        return this.idMateria;
    }

    /**
     * Método que establece el nombre de la materia.
     * @param {number} nombreMateria - Especifica el nombre de la materia a la que pertenece este test.
     */
    setNombreMateria(nombreMateria) {
        /*-- Realiza las validaciones --*/
        if (typeof(nombreMateria) != "string") {
            throw new Error("Se esperaba una cadena de texto con el nombre de la materia.");
        }
        /*-- Realiza la operación --*/
        this.nombreMateria = nombreMateria;
    }

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
     * Método que establece el usuario que ha realizado el test.
     * @param {number} idUsuarioRealizador - Id del usuario que realiza el test.
     */
    // setIDUsuarioRealizador(idUsuarioRealizador) {
    //     if (typeof(idUsuarioRealizador) != "number" || idUsuarioRealizador < 1) {
    //         throw new Error("Has especificado un id de usuario que no es válido.");
    //     }
    //     this.idUsuarioRealizador = idUsuarioRealizador;
    // }

    /**
     * Método que establece la nota que está sacando el usuario en el test.
     * @param {number} nota - Especifica la nota que está sacando el usuario en el test.
     */
    setNota(nota) {
        /*-- Realiza las validaciones --*/
        if (typeof(nota) != "number" || nota < 0 || nota > 10) {
            throw new Error("Se esperaba un número mayor entre 0 y 10 como nota de test.");
        }
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
        if (fechaRealizacion instanceof Date == false || fechaRealizacion < 1) {
            throw new Error("Has especificado una fecha de realización que no es válida.");
        }
        this.fechaRealizacion = fechaRealizacion;
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
     * - Nombre materia
     * 
     * @param {number} idTest - Especifica el id del test.
     */
    downloadInfoAboutTestByIdTest(idTest) {
        /*-- Realiza las validaciones --*/
        if (typeof(idTest) != "number" || idTest < 1) {
            throw new Error("Se esperaba un id numérico mayor de 0 como id de test.");
        }

        /*-- Obtiene los datos del servidor --*/
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_TESTS, "GET", null, {id: idTest})
        .then(response => {
            // To do
        }).catch(error => {
            /*-- Descarta que haya dado error --*/
            throw new Error("Se ha producido un error al intentar descargar la información de las preguntas del servidor. Mensaje de error: " + error.message);
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
        if (typeof(idTest) != "number" || idTest < 1 ) {
            throw new Error("Se esperaba un id numérico mayor de 0 como id de test.");
        }
        /*-- Obtiene los datos del servidor --*/
        // datos cabecera (sustituir segundo null): {id: idTest, pagina: 1}
        // pagina es un atributo que indica el nº de página que se está mostrando. Los tests se van cargando en páginas, por ejemplo, de 10 en 10 preguntas, para reducir la carga del servidor cuando se trate de tests muy largos.
        obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_PREGUNTAS, "GET", null, {id: idTest})
        
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
            throw new Error("Se ha producido un error al intentar descargar la información de las preguntas del servidor. Mensaje de error: " + error.message);
        });
    }

    /**
     * Método que descarga del servidor (si existe) la información del usuario que ha realizado este intento del test.
     * Es decir, descarga su nota, dado un id de usuario y una fecha de realización (si existen).
     * @param {number} idTestRealizado Especifica el id del usuario que ha realizado el intento del test.
     */
    downloadInfoIntentoUsuario(idTestRealizado) {
        /*-- Descarta que el idUsuario no sea válido --*/
        if (typeof(idTestRealizado) != "number") {
            throw new Error("No has especificado un id de test realizado.")
        }
        if (idTestRealizado < 1) {
            throw new Error("El id de test realizado especificado no es válido. Ha de ser mayor o igual que 1.")
        }

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
        MÉTODOS ASOCIADOS AL MODELO (han de ser creados nuevos métodos en el próximo push para que concuerde con los nuevos tipos de preguntas que añadí en el último push)
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