<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    public function getPopularTests($limit = 8)
    {
        $popularTests = Test::select('id', 'nombre_test')
            ->orderBy('numero_visitas', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();
//        dd($popularTests);

        return [
            'popularTests' => $popularTests
        ];
    }

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

    public function testSugeridos($numeroTests)
    {
        $numeroTests = $numeroTests;
        $randomTests = Test::inRandomOrder()->take($numeroTests)->get(['id', 'nombre_test']);

        return [
            'randomTests' => $randomTests
        ];
    }
}
