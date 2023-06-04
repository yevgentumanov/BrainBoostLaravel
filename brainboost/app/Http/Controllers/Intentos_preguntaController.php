<?php

namespace App\Http\Controllers;

use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;

class Intentos_preguntaController extends Controller
{
    public function index()
    {
        $intentosPreguntas = Intentos_pregunta::all();
        return response()->json(['data' => $intentosPreguntas], 200);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_intento_test' => 'required|integer',
            'id_pregunta' => 'required|integer',
            'nota_pregunta' => 'nullable|numeric',
            'respuestas' => 'required|string',
        ]);

        $data['nota_pregunta'] = floatval($data['nota_pregunta']); // Convert 'nota_pregunta' to float

        $intentosPregunta = Intentos_pregunta::create($data);
        return response()->json(['message' => 'Registro guardado correctamente', 'data' => $intentosPregunta], 201);
    }

    public function show(Request $request, string $id)
    {
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['data' => $intentosPregunta], 200);
    }

    public function update(Request $request, string $id)
    {
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $data = $request->validate([
            'id_intento_test' => 'integer',
            'id_pregunta' => 'integer',
            'nota_pregunta' => 'nullable|numeric',
            'respuestas' => 'string',
        ]);

        $intentosPregunta->update($data);
        return response()->json(['message' => 'Registro actualizado', 'data' => $intentosPregunta], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $intentosPregunta = Intentos_pregunta::find($id);

        if (!$intentosPregunta) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $intentosPregunta->delete();
        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
