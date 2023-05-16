/*=====================================
            IMPORTACIONES
 =====================================*/
// import * as globals from './globals.json';

/*====================================
            DATOS
======================================*/

let Materias = [];

/*=================================================
            INICIALIZACION
===================================================*/
/*-- Carga las materias desde la BB.DD mediante la API --*/
iniMaterias();

/*==================================================
            MÉTODOS
===================================================*/
function iniMaterias() {
    // Ejemplo:
    Materias.push({
                    id: 1,
                    nombre_materia: "El que sea"
                },
                {
                    id: 2,
                    nombre_materia: "El que sea"
                }
                );

    // To do: fetch
}