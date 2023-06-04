<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_test;
use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Test;
use Illuminate\Support\Facades\Log;

class IntentosPreguntaController extends Controller
{
    public function index()
    {
        $intentosPreguntas = Intentos_pregunta::all();
        return response()->json(['data' => $intentosPreguntas], 200);
    }

    public function store(Request $request)
    {
        // Get the user ID from the authenticated user
        $userId = $request->user()->id;

        $datosTest = [
            'id_test' => $request->id_test,
            'id_usuario' => $userId,
            'intento' => 1,
            'fecha_realizacion' => now(),
            'dificultad' => $request->dificultad,
            'modalidad' => $request->modalidad,
            'tiempo_inicio' => now(),
            'tiempo_fin' => now(),
        ];
        $intentosTest = Intentos_test::create($datosTest);

        // Find the last created test for the user
        $lastTest = Intentos_test::where('id_usuario', $userId)
            ->orderBy('id', 'desc')
            ->first();

        // Replace "id_intento_test": "id_test_creado" with the ID of the last created test
        $preguntasTestRealizado = $request->preguntasTestRealizado;
        foreach ($preguntasTestRealizado as $preguntaData) {
//            Log::info("BEFORE: id_intento_test: " . $preguntaData['id_intento_test']);
//            Log::info("BEFORE: id_pregunta: " . $preguntaData['id_pregunta']);
            $preguntaData['id_intento_test'] = $lastTest->id;
//            Log::info("AFTER: id_intento_test: " . $preguntaData['id_intento_test']);
//            Log::info("AFTER: id_pregunta: " . $preguntaData['id_pregunta']);
//        }

        // Create Intentos_pregunta records
//        foreach ($preguntasTestRealizado as $preguntaData) {

            $pregunta = new Intentos_pregunta([
                'id_intento_test' => $preguntaData['id_intento_test'],
                'id_pregunta' => $preguntaData['id_pregunta'],
                'nota_pregunta' => (float)$preguntaData['nota_pregunta'],
                'respuestas' => json_encode($preguntaData['respuestas']),
            ]);

            $pregunta->save();
        }

        // Return the response data
        return response()->json([
            'datosTest' => $datosTest,
            'preguntasTestRealizado' => $preguntasTestRealizado
        ]);
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
