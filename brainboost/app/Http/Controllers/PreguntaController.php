<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;

class PreguntaController extends Controller
{
    /**
     * Mostrar la primera pregunta.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showFirst()
    {
        $pregunta = Pregunta::first();
        $originalArray = $pregunta->getOriginal(); // Acceder al array #original
        return response()->json($originalArray);
    }

    /**
     * Mostrar todas las preguntas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showAll()
    {
        return Pregunta::all();
    }
}
