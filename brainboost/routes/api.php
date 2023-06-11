<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PreguntasController;
use App\Http\Controllers\Api\MateriasController;
use App\Http\Controllers\Api\TestController;

// Devuelve todas las materias
Route::get("materias", [MateriasController::class, "show"]);

// Devuelve las preguntas
Route::get("pregunta", [PreguntasController::class, "show"]);

// Devuelve los tests
Route::get("test", [TestController::class, "show"]);

// Guarda la informacion sobre el test y las preguntas realizadas por el usuario
Route::post('/intentos-preguntas/insert', [IntentosPreguntaController::class, 'store']);
