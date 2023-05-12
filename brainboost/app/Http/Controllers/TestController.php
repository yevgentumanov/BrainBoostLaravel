<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class TestController extends Controller
{
    public function showFirstTest()
    {
        $test = Test::first();
        if ($test) {
            return "The name of the first test is: " . $test->nombre_test;
        } else {
            return "No tests found.";
        }
    }

    public function showTestListArtes()
    {
        $tests = Test::where('id_materia', 1)->get();
        return view('materias.artes', ['tests' => $tests]);
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
    }    public function showTestListMatematicas()
    {
        $tests = Test::where('id_materia', 18)->get();
        return view('materias.matematicas', ['tests' => $tests]);
    }


}
