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
const modeApp = ModeAppEnum.PRODUCTION;

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