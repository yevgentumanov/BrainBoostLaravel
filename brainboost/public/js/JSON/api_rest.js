/**
 * API para obtener datos con AJAX en JSON de una forma fácil y sencilla. Admite tanto GET como POST.
 * Para comprender cómo funciona el método que acontece, es necesario ver cómo funcionan las promesas de JavaScript:
 * https://desarrolloweb.com/articulos/introduccion-promesas-es6.html
 * @author Santiago San Pablo Raposo
 * @version 04.06.2023
 */

/**
 * Función que permite obtener un JSON desde un servidor web. Sin los parámetros opcionales, el comportamiento por defecto es usar el método GET sin parámetros.
 * @param {string} url Especifica la URL desde la que se quiere obtener el JSON.
 * @param {string} metodo (Opcional) Especifica mediante una cadena de texto el metodo que se quiere emplear en la cabecera de la petición HTTP.
 * @param {object} headers (Opcional) Especifica un objeto literal con los headers que deseas enviar al servidor.
 * @param {object} datos (Opcional) Especifica un objeto literal con los parámetros que deseas enviar al servidor.
 * @param {Function} todoDone (Opcional) Especifica una función con un parámetro (objJson) que se ejecutará cuando el fetch tenga éxito.
 * @param {object} controller (Opcional) Especifica un objeto de tipo AbortController con el fin de asignar un AbortController y poder abortar la operación de fetch desde fuera.
 * @returns Un JSON / objeto literal con los datos que devuelva la API en el servidor en la ruta especificada.
 */
function obtenerJSON(url, metodo = "GET", headers = null, datos = null, todoDone = null, controller = null) {
    return new Promise((resolve, reject) => {
        /*-- Verificar datos de los parámetros --*/
        if (metodo != "GET" && metodo != "POST" && metodo != "PUT" && metodo != "DELETE") {
            reject("El método especificado no es correcto. Especifica GET, POST, PUT o DELETE");
        }

        // if (datos != null && typeof(datos) != "object") {
        //     reject("Especifica los parámetros de la petición en un objeto literal/JSON");
        // }
        // datos no tiene por qué ser un objeto literal/JSON.

        /*-- Efectúa la petición al servidor --*/
        let objFetch;
        let config = {method: metodo};
        switch (metodo) {
            case "GET":
                /*-- Prepara los parámetros en un objeto de tipo URL --*/
                let direccion = new URL(url);
                for (let key in datos) {
                    direccion.searchParams.append(key, datos[key]);
                }

                /*-- Config --*/
                if (headers != null && headers instanceof Object) {
                    config.headers = headers;
                }

                /*-- Realiza la petición al servidor --*/
                objFetch = fetch(direccion, config)
                    .then(response => {
                        // console.dir(response);
                        if (response.ok) {
                            return response.text();
                        } else {
                            reject("No se ha podido acceder a ese recurso. Status: " + response.status);
                        }
                    })
                    .then(responseText => {
                        let objJson = JSON.parse(responseText);
                        if (todoDone instanceof Function) {
                            todoDone(objJson);
                        }
                        resolve(objJson);
                    })
                    .catch(err => reject(err));

                    if (controller instanceof Object) {
                        objFetch.abortController = controller;
                    }
                break;
            case "POST":
                /*-- Prepara los parámetros en un objeto de tipo URLSearchParams --*/
                let parametros = new URLSearchParams();
                for (let key in datos) {
                    parametros.append(key, datos[key]);
                }

                /*-- Config --*/
                if (headers != null && headers instanceof Object) {
                    config.headers = headers;
                }
                if (datos != null) { //&& datos instanceof Object) {
                    config.body = datos;
                }
                // console.log(config);
                /*-- Realiza la petición al servidor --*/
                objFetch = fetch(url, config)
                    .then(response => {
                        // console.dir(response);
                        if (response.ok) {
                            return response.text();
                        } else {
                            reject("No se ha podido acceder a ese recurso. Status: " + response.status);
                        }
                    })
                    .then(responseText => {
                        let objJson = JSON.parse(responseText);
                        if (todoDone instanceof Function) {
                            todoDone(objJson);
                        }
                        resolve(objJson);
                    })
                    .catch(err => reject(err));
            
                    if (controller instanceof Object) {
                        objFetch.abortController = controller;
                    }
                break;
            default:
                /*-- PUT y DELETE no están implementados, ya que no he estudiado cómo funcionan --*/
                reject("No implementado el método " + metodo + ".");
                break;
        }
    });
}

/**
 * Función que permite obtener un contenido de tipo texto desde un servidor web. Sin los parámetros opcionales, el comportamiento por defecto es usar el método GET sin parámetros.
 * @param {string} url Especifica la URL desde la que se quiere obtener el contenido de tipo texto.
 * @param {string} metodo (Opcional) Especifica mediante una cadena de texto el metodo que se quiere emplear en la cabecera de la petición HTTP.
 * @param {object} headers (Opcional) Especifica un objeto literal con los headers que deseas enviar al servidor.
 * @param {object} datos (Opcional) Especifica un objeto literal con los parámetros que deseas enviar al servidor.
 * @param {Function} todoDone (Opcional) Especifica una función con un parámetro (objJson) que se ejecutará cuando el fetch tenga éxito.
 * @param {object} controller (Opcional) Especifica un objeto de tipo AbortController con el fin de asignar un AbortController y poder abortar la operación de fetch desde fuera.
 * @returns Un JSON / objeto literal con los datos que devuelva la API en el servidor en la ruta especificada.
 */
function obtenerDatosWeb(url, metodo = "GET", headers = null, datos = null, todoDone = null, controller = null) {
    return new Promise((resolve, reject) => {
        /*-- Verificar datos de los parámetros --*/
        if (metodo != "GET" && metodo != "POST" && metodo != "PUT" && metodo != "DELETE") {
            reject("El método especificado no es correcto. Especifica GET, POST, PUT o DELETE");
        }

        // if (datos != null && typeof(datos) != "object") {
        //     reject("Especifica los parámetros de la petición en un objeto literal/JSON");
        // }
        // datos no tiene por qué ser un objeto literal/JSON.

        /*-- Efectúa la petición al servidor --*/
        let objFetch;
        let config = {method: metodo};
        switch (metodo) {
            case "GET":
                /*-- Prepara los parámetros en un objeto de tipo URL --*/
                let direccion = new URL(url);
                for (let key in datos) {
                    direccion.searchParams.append(key, datos[key]);
                }

                /*-- Config --*/
                if (headers != null && headers instanceof Object) {
                    config.headers = headers;
                }

                /*-- Realiza la petición al servidor --*/
                objFetch = fetch(direccion, config)
                    .then(response => {
                        // console.dir(response);
                        if (response.ok) {
                            return response.text();
                        } else {
                            reject("No se ha podido acceder a ese recurso. Status: " + response.status);
                        }
                    })
                    .then(responseText => {
                        // let objJson = JSON.parse(responseText);
                        if (todoDone instanceof Function) {
                            todoDone(objJson);
                        }
                        resolve(responseText);
                    })
                    .catch(err => reject(err));

                    if (controller instanceof Object) {
                        objFetch.abortController = controller;
                    }
                break;
            case "POST":
                /*-- Prepara los parámetros en un objeto de tipo URLSearchParams --*/
                let parametros = new URLSearchParams();
                for (let key in datos) {
                    parametros.append(key, datos[key]);
                }

                /*-- Config --*/
                if (headers != null && headers instanceof Object) {
                    config.headers = headers;
                }
                if (datos != null && datos instanceof Object) {
                    config.body = datos;
                }

                /*-- Realiza la petición al servidor --*/
                objFetch = fetch(url, config)
                    .then(response => {
                        // console.dir(response);
                        if (response.ok) {
                            return response.text();
                        } else {
                            reject("No se ha podido acceder a ese recurso. Status: " + response.status);
                        }
                    })
                    .then(responseText => {
                        // let objJson = JSON.parse(responseText);
                        if (todoDone instanceof Function) {
                            todoDone(objJson);
                        }
                        resolve(responseText);
                    })
                    .catch(err => reject(err));
            
                    if (controller instanceof Object) {
                        objFetch.abortController = controller;
                    }
                break;
            default:
                /*-- PUT y DELETE no están implementados, ya que no he estudiado cómo funcionan --*/
                reject("No implementado el método " + metodo + ".");
                break;
        }
    });
}