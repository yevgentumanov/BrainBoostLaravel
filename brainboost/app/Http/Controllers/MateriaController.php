<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class MateriaController extends Controller
{
    public function index(Request $request){
        // Recuperación de los parámetros pasados por la barra de navegación
        $nombreMateria = $request->nombreMateria;
        $idMateria = $request->id;

        // Obtención de la materia
        $materia = Materia::where('nombre_materia', $nombreMateria)->first();

        // Obtención de los tests de la materia
        $tests = Test::where('id', $idMateria)->get();

        // Llamada a la vista con los parámetros obtenidos
        return view('materia', ['tests' => $tests, 'materia' => $materia]);
    }

}
