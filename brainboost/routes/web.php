<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


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

// Ruta principal para index
Route::get('/', function () { return view('index'); })->name('index');

// Rutas para Login
//Route::get('/login', function () { return view('login'); })->name('login')->middleware('guest');
Route::get('/login', function () { return view('login'); })->name('login');
//Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp')->middleware('guest');
Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp');

// Rutas para Logoff
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para Registro
//Route::get('/registro', function () { return view('registro'); })->name('registro')->middleware('guest');
Route::get('/registro', function () { return view('registro'); })->name('registro');
//Route::post('/registrar', [RegistroController::class, 'registrar'])->name("registrar")->middleware('guest');
Route::post('/registrar', [RegistroController::class, 'registrar'])->name("registrar");

// Rutas para gestion de cuenta de usuario
//Route::get('/registro', function () { return view('registro'); })->name('registro')->middleware('guest');
Route::get('/cuenta', function () { return view('cuenta'); })->name('cuenta');
Route::post('/cambiarpassword', [RegistroController::class, 'cambiarpassword'])->name("cambiarpassword"); // Ruta para cambiar password

// Ruta genérica para las páginas de las diferentes materias
//Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia')->middleware('guest');
Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

// Ruta genérica para las páginas de los tests de las diferentes materias
//Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name("test")->middleware('guest'); // Después el caso general (rutas parametrizadas)
Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name("test"); // Después el caso general (rutas parametrizadas)

// Ruta para guardar y mostrar informacion sobre intentos test
Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'store']); // Ruta que guarda informacion
Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'show']); // Ruta que obtiene informacion por id
