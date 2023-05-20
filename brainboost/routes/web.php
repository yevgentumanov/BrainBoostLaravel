<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Prueba;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuariosController;

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

/*=============================================================
                    REGLAS
=============================================================*/
// Route::get('/prueba', [Prueba::class, "vistaInicial"]); // Esta es la mejor manera para vincular con controladores
// Route::get("/prueba", "\App\Http\Controllers\Prueba@vistaInicial"); // Si se quiere hacer sin el use de arriba
// Route::get("/prueba", "Prueba@vistaInicial"); // No funciona

/*============================================================
            PAGINAS WEB DEFINIDAS
=============================================================*/

Route::get('/', function () { return view('index'); })->name('index');

// Ruta genérica para las páginas de las diferentes materias
Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

// Rutas de las materias
Route::get('/artes', [TestController::class, 'showTestListArtes'])->name('artes');
Route::get('/musica', [TestController::class, 'showTestListMusica'])->name('musica');
Route::get('/cienciasnaturales', [TestController::class, 'showTestListCienciasNaturales'])->name('cienciasnaturales');
Route::get('/matematicas', [TestController::class, 'showTestListMatematicas'])->name('matematicas');

// Ruta de los tests individuales
// Route::get('/test', function () {
//     return view('test');
// })->name("test");
Route::get('/test/{test}', [TestController::class, 'showTest'])->name("test");

Route::get('/test/first', [TestController::class, 'showFirstTest']);

// por arreglar
/*
Route::get('/materia', function () {
    return view('materia');
})->name("materia");
*/
Route::get('/pruebaLogicaApp', function () {
    return view('pruebaLogicaApp');
})->name("prueba");


Route::get('/tmateria', 'App\Http\Controllers\MateriaController@index');
//Route::get('/tmateria2', [MateriaController::class, 'index']);



Route::get('/usuarios/first', [UsuariosController::class, 'showFirst']);
