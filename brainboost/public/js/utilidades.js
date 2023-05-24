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

/**
 * Función que da la vuelta a un objeto JSON: las keys pasan a ser values, y viceversa.
 * @param {object} jsonObject - Especifica un objeto JSON.
 * @return El objeto JSON invertido.
 */
function inversaJSON(jsonObject) {
    let entradas = Object.entries(jsonObject);
    let inversa = {};

    for (let i = 0; i < entradas.length; i++) {
        const entrada = entradas[i];
        inversa[entrada[1]] = entrada[0];
    }

    return inversa;
}

/**
 * Función que da la vuelta a un array: las keys pasan a ser values, y viceversa.
 */
function inversaArray(array) {
    let inversa = [];

    for (let i = 0; i < array.length; i++) {
        const entrada = array[i];
        inversa[entrada] = i;
    }

    return inversa;
}

/**
 * Función que compara el contenido de dos arrays, cuyo contenido no tiene por qué estar en el mismo orden.
 * Devuelve un array que es el producto de ambas matrices, es decir, devuelve un array que contiene los elementos comunes.
 * @param arr1 - Especifica el primer array.
 * @param arr2 - Especifica el segundo array.
 * @link Fuente: https://es.stackoverflow.com/questions/415123/c%c3%b3mo-miro-si-dos-arrays-tienen-los-mismos-valores-aunque-sea-en-diferente-orde#:~:text=Tengo%202%20arrays%20con%20el%20mismo%20contenido%20%28valores,%28array%20%5Bi%5D%3D%3Darray1%20%5Bi%5D%20%7B%20total.push%20%28array%20%5Bi%5D%29%20%7D
 * @return Un array que contiene los elementos comunes a ambos arrays.
 */
function compareArraysWithoutOrder(arr1, arr2) {
    if (Array.isArray(arr1) && Array.isArray(arr2)) {
        return arr1.filter(x => arr2.some(y => x === y));
    }
}