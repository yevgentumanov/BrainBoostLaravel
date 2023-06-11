<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Muestra una lista de todas las preguntas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Pregunta::all();
    }

    /**
     * Muestra las preguntas del test especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $id_test
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, string $id_test = null)
    {
        if (!isset($id_test)) {
            $id_test = $request->get("id");
        }

        if (!isset($id_test)) {
            return $this->index();
        }

        $preguntas = Pregunta::where('id_test', $id_test)->get();

        if ($preguntas->count() > 0) {
            return response()->json($preguntas);
        } else {
            abort(404);
        }
    }


}
