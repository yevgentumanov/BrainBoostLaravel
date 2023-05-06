/*===================================================
            PAQUETE DE UTILIDADES JSON
====================================================*/

function objToJSON(obj) {
    /*-- Declaración de variables --*/
    let entradas = Object.keys(obj);
    let JSONOut = "{";

    /*-- Rellena la salida del JSON --*/
    for (let i = 0; i < entradas.length; i++) {
        JSONOut += `"${entradas[i]}":"${obj[entradas[i]]}",`;
    }

    /*-- Devuelve la cadena JSON convertida a objeto JSON --*/
    return JSON.parse(JSONOut);
}

function JSONToObj(JSON) {
    return Object.fromEntries(Object.entries(JSON));
}