<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{
    public function incrementarVisitas($id)
    {
        $test = Test::findOrFail($id);
        $test->increment('numero_visitas');

        return response()->json(['message' => 'Visits incremented successfully.']);
    }

    public function showTest(Request $request)
    {
        $idTest = $request->idTest;

        $preguntas = Pregunta::where('id_test', $idTest)->get();

        if ($preguntas->isNotEmpty()) {
            return view("test");
        } else {
            abort(404);
        }
    }

    public function testSugeridos()
    {
        $randomTests = Test::inRandomOrder()->take(6)->get(['id', 'nombre_test']);

        return [
            'randomTests' => $randomTests
        ];
    }
}
