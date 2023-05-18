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


Route::apiResource('pregunta', PreguntasController::class);
