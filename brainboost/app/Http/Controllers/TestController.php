<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Obtiene los tests más populares con el limite indicado.
     *
     * @param int $limit
     * @return array
     */
    public function getPopularTests($limit = 8)
    {
        $popularTests = Test::select('id', 'nombre_test')
            ->orderBy('numero_visitas', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();

        return [
            'popularTests' => $popularTests
        ];
    }

    /**
     * Incrementa el número de visitas de un test.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function incrementarVisitas($id)
    {
        $test = Test::findOrFail($id);
        $test->increment('numero_visitas');

        return response()->json(['message' => 'Visitas incrementadas exitosamente.']);
    }

    /**
     * Muestra un test pasado en request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
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

    /**
     * Devuelve tests sugeridos.
     *
     * @param int $numeroTests
     * @return array
     */
    public function testSugeridos($numeroTests)
    {
        $numeroTests = $numeroTests;
        $randomTests = Test::whereHas('preguntas', function ($query) {
            $query->where('tipo_pregunta', 1);
        })
            ->inRandomOrder()
            ->take($numeroTests)
            ->get(['id', 'nombre_test']);

        return [
            'randomTests' => $randomTests
        ];
    }
}
