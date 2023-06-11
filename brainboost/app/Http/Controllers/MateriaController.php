<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class MateriaController extends Controller
{
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
