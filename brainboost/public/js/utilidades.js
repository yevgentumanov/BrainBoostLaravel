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
            result[prop] = copyObject(obj[prop]);
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
 * Función que sirve para convertir un objeto JSON en un Array con las mismas claves y valores que el objeto JSON.
 * @param {object} jsonObject - Especifica un objeto JSON.
 */
function convertJSONintoArray(jsonObject) {
    const keys = Object.keys(jsonObject);
    const values = Object.values(jsonObject);
    let array = Array();
    for (let i = 0; i < keys.length; i++) {
        array[keys[i]] = values[i];
    }
    return array;
}

/**
 * Función que compara el contenido de dos arrays, cuyo contenido no tiene por qué estar en el mismo orden.
 * Devuelve un array que es el producto de ambas matrices, es decir, devuelve un array que contiene los elementos comunes.
 * @param {Array} arr1 - Especifica el primer array.
 * @param {Array} arr2 - Especifica el segundo array.
 * @param {Function} compareFunction - (Opcional) Especifica una función comparadora que se encargará de determinar si los objetos del array coinciden con los requisitos requeridos (por ejemplo, ser iguales) o no.
 * @link Fuente: https://es.stackoverflow.com/questions/415123/c%c3%b3mo-miro-si-dos-arrays-tienen-los-mismos-valores-aunque-sea-en-diferente-orde#:~:text=Tengo%202%20arrays%20con%20el%20mismo%20contenido%20%28valores,%28array%20%5Bi%5D%3D%3Darray1%20%5Bi%5D%20%7B%20total.push%20%28array%20%5Bi%5D%29%20%7D
 * @return Un array que contiene los elementos comunes a ambos arrays.
 */
function compareArraysWithoutOrder(arr1, arr2, compareFunction = null) {
    if (!Array.isArray(arr1) || !Array.isArray(arr2)) throw new Error("compareArraysWithoutOrder: No se han pasado arrays por parámetro.");
    if (Array.isArray(arr1) && Array.isArray(arr2)) {
        if (compareFunction != null) {
            if (compareFunction instanceof Function == false) {
                throw new Error("compareArraysWithoutOrder: No se ha pasado una función de comparación como parámetro del argumento 'compareFunction'.")
            }
            return arr1.filter(x => arr2.some(y => compareFunction(x, y)));
        } else {
            return arr1.filter(x => arr2.some(y => x === y));
        }
    }
}

/**
 * Función que compara el contenido de dos arrays, cuyo contenido ha de estar en el mismo orden.
 * Devuelve un array que es el producto de ambas matrices, es decir, devuelve un array que contiene los elementos comunes.
 * @param {Array} arr1 - Especifica el primer array.
 * @param {Array} arr2 - Especifica el segundo array.
 * @param {Function} compareFunction - (Opcional) Especifica una función comparadora que se encargará de determinar si los objetos del array coinciden con los requisitos requeridos (por ejemplo, ser iguales) o no.
 */
function compareArraysInOrder(arr1, arr2, compareFunction = null) {
    let comunes = Array();
    // Recorrer los elementos de los arreglos al mismo tiempo
    for (let i = 0; i < arr1.length; i++) {
        // Comparar los elementos en las posiciones correspondientes
        if (compareFunction instanceof Function) {
            if (compareFunction(arr1[i]), arr2[i]) {
                comunes[i] = arr1[i];
            }
        } else {
            if (arr1[i] === arr2[i]) {
                comunes[i] = arr1[i];
            }
        }
    }

    return comunes;
}

/**
 * Función que sirve para comparar dos elementos, sean del tipo que sean (datos de tipo primitivo, arrays, objetos, etc.)
 * @param {*} a 1º Elemento a comparar
 * @param {*} b 2º Elemento a comparar
 * @returns true si los elementos son iguales; false si no lo son.
 */
function comparar(a, b) {
    // Verificar si son del mismo tipo
    if (typeof a !== typeof b) {
      return false;
    }
  
    // Comparar objetos
    if (typeof a === 'object' && typeof b === 'object') {
      // Comparar arrays
      if (Array.isArray(a) && Array.isArray(b)) {
        if (a.length !== b.length) {
          return false;
        }
  
        for (let i = 0; i < a.length; i++) {
          if (!comparar(a[i], b[i])) {
            return false;
          }
        }
  
        return true;
      }
  
      // Comparar objetos regulares
      const keysA = Object.keys(a);
      const keysB = Object.keys(b);
  
      if (keysA.length !== keysB.length) {
        return false;
      }
  
      for (let i = 0; i < keysA.length; i++) {
        const key = keysA[i];
  
        if (!comparar(a[key], b[key])) {
          return false;
        }
      }
  
      return true;
    }
  
    // Comparar valores primitivos
    return a === b;
  }