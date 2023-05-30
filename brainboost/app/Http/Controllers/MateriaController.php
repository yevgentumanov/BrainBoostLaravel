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

        // Obtención de la materia
        $materia = Materia::where('nombre_materia', $nombreMateria)->first();

        $idMateria = $materia->id;

        // Obtención de los tests de la materia
        $tests = Test::where('id_materia', $idMateria)->get();
        $tests = $tests->sortBy('id');

        // Llamada a la vista con los parámetros obtenidos
        return view('materia', ['tests' => $tests, 'materia' => $materia]);
    }

}
