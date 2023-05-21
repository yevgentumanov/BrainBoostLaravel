/*===================================
        ENUMERADOS
====================================*/
/**
 * Enumerado de modos disponibles de aplicación
 */
const ModeAppEnum = {
    PRODUCTION: 0,
    LOCALDEBUG: 1
}

/*===================================
        CONSTANTES
====================================*/
const modeApp = ModeAppEnum.PRODUCTION;

const Rutas = {
    "HOST_NAME": modeApp == ModeAppEnum.PRODUCTION ? 
                        "https://www.clinicadentalsanandres.com/BrainBoostLaravel/brainboost/public" :
                        "http://localhost/Proyectos/BrainBoostLaravel/brainboost/public",
    "RUTA_API_PREGUNTAS": "/api/pregunta",
    "RUTA_API_TEST": "/api/test",
    "RUTA_API_MATERIAS": "/api/materias",
    "RUTA_API_CATEGORIAS": "/api/categorias",
    "RUTA_API_USUARIOS": "/api/usuarios"
}