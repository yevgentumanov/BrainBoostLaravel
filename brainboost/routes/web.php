<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VIntentosTestController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MateriaController;

Auth::routes(['verify' => true]);

// Ruta principal para el índice
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/empresa', function () {
    return view('empresa');
})->name('empresa');

// Rutas que no necesitan autenticación
Route::middleware('guest')->group(function () {

    // Rutas para Google auth
    Route::get('/google-auth/redirect', function () {
        return Socialite::driver('google')->redirect();
    });
    Route::get('/google-auth/callback', [UsuariosController::class, 'googleAuthCallback'])->name('googleauthcallback');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/logintoapp', [UsuariosController::class, 'logintoapp'])->name('logintoapp');

    // Rutas para Registro
    Route::get('/registro', function () {
        return view('registro');
    })->name('registro');
    Route::post('/registrar', [UsuariosController::class, 'registrar'])->name('registrar');

});

// Rutas que solo necesitan autenticación
Route::middleware(['auth'])->group(function () {

    // Rutas para Logoff
    Route::get('/salir', [UsuariosController::class, 'salir'])->name('salir');

    // Rutas de verificación de correo electrónico
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        Log::info('Ruta de verificación de correo electrónico accedida para el usuario: ' . $request->user()->email);
        $request->fulfill();

        // Comprobar si se actualiza la columna email_verified_at
        Log::info('email_verified_at: ' . $request->user()->email_verified_at);

        return redirect('/')->with('verified', true);
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', '¡Enlace de verificación enviado!');
    })->middleware(['throttle:6,1'])->name('verification.send');

});

Route::middleware(['auth', 'verified'])->group(function () {

    // Rutas para la gestión de la cuenta de usuario
    Route::get('/cuenta', [VIntentosTestController::class, 'getCuentaView'])->name('cuenta');
    Route::post('/cambiarpassword', [UsuariosController::class, 'cambiarpassword'])->name('cambiarpassword');

    // Rutas del historial de los tests realizados
    Route::get('/testhistorial', [VIntentosTestController::class, 'historialTestRealizados'])->name('testhistorial');

    // Ruta genérica que devuelve la página de una materia, según el nombre de la materia proporcionado.
    Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

    // Ruta genérica para las páginas de los tests de las diferentes materias
    Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name('test');
    Route::get('/tests/{id}/incrementarVisitas', [TestController::class, 'incrementarVisitas'])->name('tests.increment');

    // Ruta para guardar y mostrar información sobre los intentos de tests
    Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'store']);
    Route::post('/preguntas_realizadas', [IntentosPreguntaController::class, 'preguntasRealizadasIntento']);

});
