<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;


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


// Ruta principal para index
Route::get('/', function () { return view('index'); })->name('index');

// Rutas para Login
Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp');

// Rutas para Registro
Route::get('/registro', function () { return view('registro'); })->name('registro');
Route::post('/registrar', [RegistroController::class, 'registrar'])->name("registrar");

// Ruta genérica para las páginas de las diferentes materias
Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

// Ruta genérica para las páginas de los tests de las diferentes materias
Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name("test"); // Después el caso general (rutas parametrizadas)


Route::get('/tmateria', 'App\Http\Controllers\MateriaController@index');
