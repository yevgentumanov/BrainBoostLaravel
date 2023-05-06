<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Prueba;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*============================================================
            PAGINAS WEB DEFINIDAS
=============================================================*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/materia', function () {
    return view('materia');
})->name("materia");

Route::get('/pruebaLogicaApp', function () {
    return view('pruebaLogicaApp');
})->name("prueba");

Route::get('/test', function () {
    return view('test');
})->name("test");

Route::get('/prueba', [Prueba::class, "vistaInicial"]);
// Route::get("/prueba", "\App\Http\Controllers\Prueba@vistaInicial"); // Si se quiere hacer sin el use de arriba
// Route::get("/prueba", "Prueba@vistaInicial"); // No funciona
