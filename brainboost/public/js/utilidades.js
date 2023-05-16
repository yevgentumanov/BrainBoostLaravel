class Random {
    static randomInt(min = 0, max = 1) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    static randomFloat(min = 0, max = 1) {
        return Math.random() * (max - min + 1) + min; // No sé si está bien
    }
}

/**
 * Crea una copia de un objeto definido por una clase, conservando sus métodos (ya que no utiliza las funciones de JSON.parse y JSON.stringify).
 * @param {*} obj Pasa el objeto a copiar por parámetro.
 * @returns La copia generada del objeto.
 */
function copyObject(obj) {
    let result;
    if (obj instanceof Array) {
        result = [...obj];
    } else if (typeof obj === 'object') {
        result = {};
        for (let prop in obj) {
            result[prop] = copy(obj[prop]);
        }
    } else {
        result = obj;
    }
    return result;
}

function hola() {
    console.log("Hola soy utilidades.js");
}