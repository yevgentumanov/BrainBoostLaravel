<?php

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

/*-- CUSTOM (no es de Laravel): Vamos a sincronizar lo primero el GitHub --*/
$prueba;
try {
    // shell_execute('git pull | cd /var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost');
    // `git pull | cd /var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost`;
    // $prueba = system('git pull | cd /var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost');
    $prueba = system('ll | cd /var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost');
    // $prueba = system("man man");
    var_dump($prueba);
} catch (\Throwable $th) {
    //throw $th;
    echo "Prueba:\n<br>";
    var_dump($prueba);
}

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

Route::get('/prueba', function () {
    return view('prueba');
})->name("prueba");