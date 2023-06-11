/**
 * Fichero donde se implementa el modelo de datos de las materias.
 * @author Santiago
 * @version 11.06.2023
 */

/*====================================
            ENUMERADOS
======================================*/
const ErroresMateria = [
    "__ERR_SUBJECT_ID_INVALID",
    "__ERR_SUBJECT_NAME_INVALID" // Nombre materia inválido
]

const CodigosErrorMateria = (() => {
    let codigos = Array();
    let cod = -1;

    for (let i = 0; i < ErroresMateria.length; i++) {
        codigos.push(cod);
        /*-- Incrementa el código de error (en valor negativo) --*/
        cod--;
    }
    return codigos;
})();
const CodigosErrorInversa = inversaArray(CodigosErrorMateria);

const MensajesErrorMateria = (() => {
    let mensajes = {};
    /*-- Añade mensajes a la lista de mensajes --*/
    mensajes[ErroresMateria[0]] = {
        errorName: ErroresMateria[0],
        errorCode: CodigosErrorMateria[0],
        message: `Id de materia inválido. Valores válidos: {0,${ErroresMateria.length - 1}}"`
    }
    mensajes[ErroresMateria[1]] = {
        errorName: ErroresMateria[1],
        errorCode: CodigosErrorMateria[1],
        message: "El nombre de materia especificado no existe."
    }
    //

    return mensajes;
})();

/*====================================
            DATOS
======================================*/

let Materias = [];

/*=================================================
            INICIALIZACION
===================================================*/
/*-- Carga las materias desde la BB.DD mediante la API --*/
iniMaterias();

/*==================================================
            MÉTODOS
===================================================*/
function iniMaterias() {
    // Ejemplo:
    // Materias.push({
    //     id: 1,
    //     nombre_materia: "El que sea"
    // },
    //     {
    //         id: 2,
    //         nombre_materia: "El que sea"
    //     }
    // );

    /*-- Obtiene los datos del servidor --*/
    const rutaRelativa = calcularRuta(Rutas.RUTA_API_MATERIAS.url);
    obtenerJSON(rutaRelativa, Rutas.RUTA_API_MATERIAS.method, null, null)
    .then(response => {
        response.forEach(materia => {
            /*-- Agrega la materia al array de materias --*/
            Materias.push(materia);
        });
        MATERIAS_LOADED = true; // Cambia el flag a true
    }).catch(error => {
        /*-- Descarta que haya dado error --*/
        throw new Error(`${MensajesErrorTest["__ERR_TEST_INFO_FETCH"].message} Mensaje de error: ${error.message}`);
    })
}

/**
 * Método que sirve para validar si un id de materia es válido (existe).
 * @param {number} idMateria - Especifica el id de la materia.
 * @returns true si el idMateria es válido; false si no.
 */
function validaIdMateria(idMateria, withoutDownload = false) {
    /*-- Realiza las validaciones --*/
    if (typeof(idMateria) != "number" || idMateria < 0) {
        return false;
    }
    return true;
}

/**
 * @deprecated (Deprecado) Método que sirve para validar si un nombre de materia es válido (existe).
 * 
 * @param {string} nombreMateria - Especifica el nombre de la materia.
 * @returns true si el nombre de la materia coincide con el de alguna de las que hay almacenadas en el array Materias; false si no.
 */
function validaNombreMateria(nombreMateria) {
    /*-- Realiza las validaciones --*/
    Materias.forEach(m => {
        if (nombreMateria == m.nombre_materia) {
            return true;
        }
    });
    return false;
}