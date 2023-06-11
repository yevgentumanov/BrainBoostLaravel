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
    // 1: "https://www.clinicadentalsanandres.com/BrainBoostLaravel/brainboost/public", // PRODUCTION
    1: "https://brainboost.es", // PRODUCTION
    2: "http://brainboost.com" // LOCALDEBUG Santi
    // 2: "http://127.0.0.1:8000" // LOCALDEBUG Eugenio
    // 2: "" // LOCALDEBUG Juan Carlos
}

/*===================================
            CONSTANTES
====================================*/
const modeApp = ModeAppEnum.PRODUCTION; // Flag a cambiar

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
    "RUTA_API_PREGUNTAS_REALIZADAS_INTENTO": {
        url: "/preguntas_realizadas",
        method: "POST"
    },
    "RUTA_API_AUMENTAR_VISITAS_TEST": {
        url: "/tests//incrementarVisitas",
        method: "GET"
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
/**
 * Método que sirve para calcular rutas relativas, dada la dirección de document.location.href (dirección actual), y una ruta de API a la que se desea acceder (pasada por parámetro).
 * @param {string} ruta - Especifica la ruta de la API (sacada del objeto Rutas).
 * @returns La ruta convertida a ruta relativa, según la dirección de Rutas.HOST_NAME
 */
function calcularRuta(ruta) {
    /*-- Obtiene la dirección URL del navegador --*/
    let url = document.location.href;

    /*-- Obtiene la ruta de la API --*/
    let pathApi = `${Rutas.HOST_NAME}${ruta}`;

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
