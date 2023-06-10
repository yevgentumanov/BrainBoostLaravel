<?php

use App\Http\Controllers\Api\IntentosPreguntaController;
use App\Http\Controllers\Intentos_preguntaController;
use App\Http\Controllers\Intentos_testController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VIntentosTestController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MateriaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify' => true]);

// Ruta principal para index
Route::get('/', function () {
    return view('index');
})->name('index');

// Rutas que no necesitan autentificacion
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

//Rutas que solo necesitan autentificacion
Route::middleware(['auth'])->group(function () {

    // Rutas para Logoff
    Route::get('/salir', [UsuariosController::class, 'salir'])->name('salir');

    // Email verification routes
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        Log::info('Email verification route accessed for user: ' . $request->user()->email);
        $request->fulfill();

        // Check if the email_verified_at column is updated
        Log::info('email_verified_at: ' . $request->user()->email_verified_at);

        return redirect('/')->with('verified', true);
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

});


Route::middleware(['auth', 'verified'])->group(function () {

    // Rutas para gestión de cuenta de usuario
    Route::get('/cuenta', [VIntentosTestController::class, 'getCuentaView'])->name('cuenta');
    Route::post('/cambiarpassword', [UsuariosController::class, 'cambiarpassword'])->name('cambiarpassword');

    // Rutas de historial de los test realizados
    Route::get('/testhistorial', [VIntentosTestController::class, 'historialTestRealizados'])->name('testhistorial');

    // Ruta genérica que devuelve la página de materia, dependiendo de qué materia se le pase por nombreMateria.
    Route::get('/materia/{nombreMateria}', [MateriaController::class, 'index'])->name('materia');

    // Ruta genérica para las páginas de los tests de las diferentes materias
    Route::get('/test/{idTest}', [TestController::class, 'showTest'])->name('test');
    Route::get('/tests/{id}/incrementarVisitas', [TestController::class, 'incrementarVisitas'])->name('tests.increment');

    // Ruta para guardar y mostrar información sobre intentos test
    Route::post('/intentos_pregunta', [IntentosPreguntaController::class, 'store']);
    Route::post('/preguntas_realizadas', [IntentosPreguntaController::class, 'preguntasRealizadasIntento']);

});

// Rutas de prueba (non-production routes)
Route::get('/addfaketest', [Intentos_testController::class, 'addFakeData']);
Route::get('/pruebatest', function () {
    return view('prueba');
});
