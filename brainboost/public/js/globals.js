/*===================================
        ENUMERADOS
====================================*/
/**
 * Enumerado de modos disponibles de aplicación
 */
const ModeAppEnum = {
    PRODUCTION: 1,
    LOCALDEBUG: 2
}

const ModeAppDirecciones = {
    1: "https://www.clinicadentalsanandres.com/BrainBoostLaravel/brainboost/public",
    2: "http://localhost/Proyectos/BrainBoostLaravel/brainboost/public"
}

/*===================================
            CONSTANTES
====================================*/
const modeApp = ModeAppEnum.LOCALDEBUG; // Flag a cambiar

const Rutas = {
    "HOST_NAME": ModeAppDirecciones[modeApp],
    "RUTA_API_PREGUNTAS": {
        url: "/api/pregunta",
        method: "GET"
    },
    "RUTA_API_TEST": {
        url: "/api/test",
        method: "GET"
    },
    "RUTA_API_ENVIO_TEST_REALIZADO": {
        url: "/intentos_pregunta",
        method: "POST"
    },
    "RUTA_API_MATERIAS": {
        url: "/api/materias",
        method: "GET"
    },
    "RUTA_API_CATEGORIAS": {
        url: "/api/categorias",
        method: "GET"
    },
    "RUTA_API_USUARIOS": {
        url: "/api/usuarios",
        method: "GET"
    }
}

/*=====================================
        FLAGS GLOBALES
======================================*/
let MATERIAS_LOADED = false;

/*=====================================
            MÉTODOS
======================================*/
// function calcularRuta(ruta) {
//     /*-- Obtiene la dirección URL del navegador --*/
//     let url = document.location.href;

//     /*-- Obtiene la ruta de la API --*/
//     let pathApi = `${ModeAppDirecciones[modeApp]}${ruta.url}`;

//     /*-- Quita la parte común de las dos rutas del principio --*/
//     const comun = "";
//     for (let i = 0; i < (url.length < pathApi.length ? url.length: pathApi.length) && url.charAt(i) == pathApi.charAt(i); i++) {
//         comun += url.charAt(i);
//     }
//     url = url.replace(comun, "");
//     pathApi = pathApi.replace(comun, "");

//     /*-- Obtiene las rutas divididas por el separador / --*/
//     const urlDividida = url.split("/");
//     const pathApiDividida = pathApi.split("/");

//     /*-- Obtiene la diferencia de las dos rutas (en cuanto a número de profundidad de la ruta) --*/
//     const diferencia = pathApiDividida.length - urlDividida.length;
    
//     /*-- Construye la ruta relativa --*/ {
//         let rutaRelativa = "";
//         /*-- Va para atrás en la ruta --*/
//         if (diferencia > 0) {
//             for (let i = 0; i < )
//         } else {

//         }
//         /*-- Escirbe la ruta de la API --*/
//         if (i == 0) {
//             rutaRelativa = `.${ruta.url}`;
//         } else if (i > 0) {

//         }

//     }
// }

// function calcularRuta(ruta) {
//     /*-- Obtiene la dirección URL del navegador --*/
//     let url = document.location.href;

//     /*-- Obtiene la ruta de la API --*/
//     let pathApi = `${ModeAppDirecciones[modeApp]}${ruta.url}`;

//     /*-- Quita la parte común de las dos rutas del principio --*/
//     let comun = "";
//     for (let i = 0; i < (url.length < pathApi.length ? url.length : pathApi.length) && url.charAt(i) == pathApi.charAt(i); i++) {
//         comun += url.charAt(i);
//     }
//     url = url.replace(comun, "");
//     pathApi = pathApi.replace(comun, "");

//     /*-- Obtiene las rutas divididas por el separador / --*/
//     const urlDividida = url.split("/");
//     const pathApiDividida = pathApi.split("/");

//     /*-- Obtiene la diferencia de las dos rutas (en cuanto a número de profundidad de la ruta) --*/
//     const diferencia = pathApiDividida.length - urlDividida.length;

//     /*-- Obtiene el nº de niveles de directorio necesarios para llegar a la ruta base --*/
//     // const 

//     /*-- Construye la ruta relativa --*/
//     let rutaRelativa = "";

//     // Agrega los niveles de directorio necesarios para llegar a la ruta base
//     for (let i = 0; i < diferencia; i++) {
//         rutaRelativa += "../";
//     }

//     // Agrega la parte restante de la ruta de la API
//     for (let i = diferencia; i < pathApiDividida.length; i++) {
//         rutaRelativa += pathApiDividida[i];
//         if (i < pathApiDividida.length - 1) {
//             rutaRelativa += "/";
//         }
//     }

//     return rutaRelativa;
// }


function calcularRuta(ruta) {
    /*-- Obtiene la dirección URL del navegador --*/
    let url = document.location.href;

    /*-- Obtiene la ruta de la API --*/
    let pathApi = `${ModeAppDirecciones[modeApp]}${ruta.url}`;

    /*-- Quita la parte común de las dos rutas del principio --*/
    let comun = "";
    for (let i = 0; i < (url.length < pathApi.length ? url.length : pathApi.length) && url.charAt(i) == pathApi.charAt(i); i++) {
        comun += url.charAt(i);
    }
    url = url.replace(comun, "");
    pathApi = pathApi.replace(comun, "");

    /*-- Obtiene las rutas divididas por el separador / --*/
    const urlDividida = url.split("/");
    const pathApiDividida = pathApi.split("/");

    /*-- Construye la ruta relativa --*/
    let rutaRelativa = "";
    /*-- Agrega los niveles de directorio necesarios para llegar a la parte común --*/
    for (let i = 0; i < urlDividida.length; i++) {
        rutaRelativa += "../";
    }
    /*-- Agrega la ruta de la API --*/
    rutaRelativa += pathApiDividida.join("/");

    return rutaRelativa;
}
