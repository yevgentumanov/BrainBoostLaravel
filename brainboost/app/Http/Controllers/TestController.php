<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class TestController extends Controller
{
    public function showTest(Request $request) {
        
        $idTest = $request->test;

        // Obtención de los datos del test
        $test = Test::find($idTest);

        $preguntas = Pregunta::where('id_test', $idTest)->get();

        return view("test", ['test' => $test, 'preguntas' => $preguntas]);
    }

    public function showFirstTest()
    {
        $test = Test::first();
        if ($test) {
            return $test;
        } else {
            return "No tests found.";
        }
    }

    public function showTestListArtes()
    {
        $tests = Test::where('id_materia', 1)->get();
        return view('materias', ['tests' => $tests]);
    }
    public function showTestListMusica()
    {
        $tests = Test::where('id_materia', 2)->get();
        return view('materias.musica', ['tests' => $tests]);
    }
    public function showTestListCienciasNaturales()
    {
        $tests = Test::where('id_materia', 5)->get();
        return view('materias.сienciasNaturales', ['tests' => $tests]);
    }
    public function showTestListMatematicas()
    {
        $tests = Test::where('id_materia', 18)->get();
        return view('materias.matematicas', ['tests' => $tests]);
    }

}
