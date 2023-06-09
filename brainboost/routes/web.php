<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intentos_preguntaController;
use App\Http\Controllers\Intentos_testController;
use App\Http\Controllers\VIntentosTestController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


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

// Rutas para páginas web definidas

// Ruta principal para index
Route::get('/', function () {
    return view('index');
})->name('index');

// Rutas para Login
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/logintoapp', [LoginController::class, 'logintoapp'])->name('logintoapp');

// Rutas para Logoff
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para Registro
Route::get('/registro', function () {
    return view('registro');
})->name('registro')->middleware('guest');

Route::post('/registrar', [RegistroController::class, 'registrar'])->name('registrar');

// Rutas para Google auth
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', [UsuariosController::class, 'googleAuthCallback'])->name('googleauthcallback');

//Route::get('/google-auth/callback', 'UsuariosController@googleAuthCallback');

//Route::get('/google-auth/callback', function () {
//    $user = Socialite::driver('google')->stateless()->user();
//    $usuario = Usuario::updateOrCreate([
//        'google_id' => $user->id,
//    ], [
//            'nombre_usuario' => $user->name,
//            'email' => $user->email,
//        ]
//    );
//    Auth::login($usuario);
//    return redirect('/');
//});

// Rutas para gestión de cuenta de usuario
Route::get('/cuenta', [VIntentosTestController::class, 'getCuentaView'])->name('cuenta')->middleware('auth');
Route::post('/cambiarpassword', [RegistroController::class, 'cambiarpassword'])->name('cambiarpassword')->middleware('auth');

// Rutas de historial de los test realizados
Route::get('/testhistorial', [VIntentosTestController::class, 'historialTestRealizados'])->name('testhistorial')->middleware('auth');

// Ruta genérica que devuelve la página de materia, dependiendo de qué materia se le pase por nombreMateria.
Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

// Ruta genérica para las páginas de los tests de las diferentes materias
Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name('test')->middleware('auth');
Route::get('/tests/{id}/incrementarVisitas', [TestController::class, 'incrementarVisitas'])->name('tests.increment')->middleware('auth');

// Ruta para guardar y mostrar información sobre intentos test
Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'store'])->middleware('auth');
Route::post('/preguntas_realizadas', [IntentosPreguntaController::class, 'preguntasRealizadasIntento'])->middleware('auth');

// Rutas de prueba (non-production routes)
Route::get('/addfaketest', [Intentos_testController::class, 'addFakeData']);
Route::get('/pruebatest', function () {
    return view('prueba');
});
