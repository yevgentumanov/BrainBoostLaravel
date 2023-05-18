<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\Api\PreguntasController;


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



//Route::get('/primerapregunta', [PreguntaController::class, 'showFirst']);
//Route::get('/todaspreguntas', [PreguntaController::class, 'showAll']);

/*--  Ver: https://stackoverflow.com/questions/54721576/laravel-route-apiresource-difference-between-apiresource-and-resource-in-route --*/
// Route::apiResource('pregunta', PreguntasController::class);
// En TestModel.js se necesita enviar por get/post para que se hagan de manera correcta las solicitudes a la API
Route::get("pregunta", [PreguntasController::class, "show"]);
