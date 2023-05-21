<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\Api\PreguntasController;
use App\Http\Controllers\Api\TestUsuarioController;
use App\Http\Controllers\Api\MateriasController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*--  Ver: https://stackoverflow.com/questions/54721576/laravel-route-apiresource-difference-between-apiresource-and-resource-in-route --*/
// Route::apiResource('pregunta', PreguntasController::class);
// En TestModel.js se necesita enviar por get/post para que se hagan de manera correcta las solicitudes a la API

// Devuelve todas las materias
Route::get("materias", [MateriasController::class, "show"]); // devuelve materia con ID de materia indicado
Route::get("categoria", [MateriasController::class, "showCategoria"]); // devuelve materia con ID de materia indicado

// Rutas de preguntas
Route::get("pregunta", [PreguntasController::class, "show"]); // devuelve todas las preguntas o las preguntas del ID test

Route::group(['prefix' => 'api'], function () {
    Route::get('/test-usuarios', [TestUsuarioController::class, 'index']);
    Route::post('/test-usuarios', [TestUsuarioController::class, 'store']);
    Route::get('/test-usuarios/{id}', [TestUsuarioController::class, 'show']);
    Route::put('/test-usuarios/{id}', [TestUsuarioController::class, 'update']);
    Route::delete('/test-usuarios/{id}', [TestUsuarioController::class, 'destroy']);
});
