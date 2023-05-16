/*-- Fichero donde se implementarán métodos para crear la vista del test dinámicamente, con los datos que reciba de TestModel --*/
/*=====================================
            IMPORTACIONES
 =====================================*/
// import * as model from './TestModel.js';
// import * as utilities from './utilidades.js';

/*==========================================
        MÉTODOS ASOCIADOS A LA VISTA
===========================================*/

function prueba() {
    let prueba = new model.Test(utilities.Random.randomInt(1, 100), [
        {"id_pregunta": 1, "id_test": 1, "nombre_pregunta": "Formulación de la pregunta 1", "respuestas":
        ["Respuesta A", "Respuesta B", "Respuesta C", "Respuesta D"],
        "respuesta_correcta": "Respuesta B"},
    
        {"id_pregunta": 2, "id_test": 1, "nombre_pregunta": "Formulación de la pregunta 2", "respuestas":
        ["Respuesta A", "Respuesta B", "Respuesta C", "Respuesta D"],
        "respuesta_correcta": "Respuesta C"}
    ]);

    console.log(prueba.getLength());

    let prueba2 = model.crearTestRespuestaUnica(10);
}