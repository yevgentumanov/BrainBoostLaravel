<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Test;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Muestra la página de una materia y los tests asociados a ella.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $nombreMateria = $request->nombreMateria;

        $materia = Materia::where('nombre_materia', $nombreMateria)->first();
        $idMateria = $materia->id;

        $tests = Test::where('id_materia', $idMateria)
            ->whereHas('preguntas', function ($query) {
                $query->where('tipo_pregunta', 1);
            })
            ->get()
            ->sortBy('id');

        return view('materia', ['tests' => $tests, 'materia' => $materia]);
    }
}
