<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intentos_preguntaController;
use App\Http\Controllers\Intentos_testController;
use App\Http\Controllers\VIntentosTestController;



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
Route::get('/login', function () { return view('login'); })->name('login')->middleware('guest'); // Ruta para acceder al formulario Login
//Route::get('/login', function () { return view('login'); })->name('login');
//Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp')->middleware('guest');
Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp'); // Ruta para inicio session POST

// Rutas para Logoff
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); // Ruta que desloguea al usuario

// Rutas para Registro
Route::get('/registro', function () { return view('registro'); })->name('registro')->middleware('guest'); // Ruta para acceder al formulario de registro
//Route::get('/registro', function () { return view('registro'); })->name('registro');
//Route::post('/registrar', [RegistroController::class, 'registrar'])->name("registrar")->middleware('guest');
Route::post('/registrar', [RegistroController::class, 'registrar'])->name("registrar");  // Ruta para registro de usuario POST

// Rutas para gestion de cuenta de usuario
Route::get('/cuenta', [VIntentosTestController::class, 'getCuentaView'])->name('cuenta')->middleware('auth'); // Ruta que devuelve la vista de la cuenta de usuario
Route::post('/cambiarpassword', [RegistroController::class, 'cambiarpassword'])->name("cambiarpassword")->middleware('auth'); // Ruta para cambiar password POST

//Rutas de historial de los test realizados

// Ruta para ver el historial completo de test realizados por el usuario
Route::get('/testhistorial', function () {
    $idUsuarioAccediendo = auth()->user()->id;
    $VIntentosTestController = new VIntentosTestController();
    return $VIntentosTestController->historialTestRealizados($idUsuarioAccediendo);
})->name('testhistorial')->middleware('auth');

// Ruta genérica que devuelve la pagina de materia, dependiendo de que materia se le pase por materia.
Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

// Ruta genérica para las páginas de los tests de las diferentes materias
//Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name("test")->middleware('guest'); // Después el caso general (rutas parametrizadas)
Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name("test")->middleware('auth'); // Después el caso general (rutas parametrizadas)
Route::get('/tests/{id}/incrementarVisitas', [TestController::class, 'incrementarVisitas'])->name('tests.increment')->middleware('auth'); // Ruta para auementar el numero de visitas al test

// Ruta para guardar y mostrar informacion sobre intentos test
Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'store'])->middleware('auth'); // Ruta que guarda informacion
Route::post('/preguntas_realizadas', [IntentosPreguntaController::class, 'preguntasRealizadasIntento'])->middleware('auth'); // Ruta que devuelve las preguntas del intento test
//Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'show']); // Ruta que obtiene informacion por id

Route::get('/addfaketest', [Intentos_testController::class, 'addFakeData']); // Ruta para añadir test falso
Route::get('/pruebatest', function () { return view('prueba'); }); // Ruta para añadir test falso


