<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;

class IntentosPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Intentos_pregunta records
        $intentosPreguntas = Intentos_pregunta::all();

        return response()->json(['data' => $intentosPreguntas], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|integer',
            'id_pregunta' => 'required|integer',
            'intento' => 'nullable|integer',
            'nota' => 'nullable|numeric',
            'fecha_realizacion' => 'nullable|date',
            'respuestas' => 'required|string',
            'dificultad' => 'nullable|integer',
            'modalidad' => 'nullable|integer',
            'tiempoInicio' => 'nullable|date',
            'tiempoFin' => 'nullable|date',
        ]);

        $intentosPregunta = Intentos_pregunta::create($data);

        return response()->json(['message' => 'Registro guardado correctamente', 'data' => $intentosPregunta], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['data' => $intentosPregunta], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update the Intentos_pregunta record with the given ID
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $data = $request->validate([
            'id_usuario' => 'integer',
            'id_pregunta' => 'integer',
            'intento' => 'nullable|integer',
            'nota' => 'nullable|numeric',
            'fecha_realizacion' => 'nullable|date',
            'respuestas' => 'string',
            'dificultad' => 'nullable|integer',
            'modalidad' => 'nullable|integer',
            'tiempoInicio' => 'nullable|date',
            'tiempoFin' => 'nullable|date',
        ]);

        $intentosPregunta->update($data);

        return response()->json(['message' => 'Registro actualizado', 'data' => $intentosPregunta], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $intentosPregunta->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
