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

/*============================================================
            PAGINAS WEB DEFINIDAS
=============================================================*/

Route::get('/', function () {
    return view('index');
});

Route::get('/materia', function () {
    return view('materia');
})->name("materia");

Route::get('/pruebaLogicaApp', function () {
    return view('pruebaLogicaApp');
})->name("prueba");

Route::get('/test', function () {
    return view('test');
});