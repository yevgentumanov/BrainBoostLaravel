<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Test;

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

        // Get the request data
        $requestData = $request->all();

        // Combine the user ID and request data
        $responseData = [
            'user_id' => $userId,
            'request_data' => $requestData
        ];

        // Return the response data
        return response()->json($responseData);
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

    public function addFakeData()
    {
        for ($i = 21; $i < 31; $i++) {
            $fakeData = [
                'id_intento_test' => 1,
                'id_pregunta' => $i,
                'nota_pregunta' => 12.34,
                'respuestas' => '{"respuestas_correctas": "Claude Debussy"}',
            ];
            $intentosPregunta = Intentos_pregunta::create($fakeData);
        }
        return "done";
    }

    public function returnHistorial($idUsuario, $nombreUsuarioAccediendo)
    {
        $tests = Intentos_pregunta::join('preguntas', 'preguntas.id', '=', 'intentos_preguntas.id_pregunta')
            ->join('tests', 'preguntas.id_test', '=', 'tests.id')
            ->select('intentos_preguntas.id_usuario', 'tests.nombre_test', 'intentos_preguntas.id_pregunta', 'preguntas.nombre_pregunta', 'intentos_preguntas.respuestas', 'intentos_preguntas.nota_pregunta as nota')
            ->get();

        return view('historialTestRealizados', ['tests' => $tests]);
    }

    public function returnHistorialPreguntasRespondidas($idUsuario)
    {
        $preguntas = Intentos_pregunta::join('preguntas', 'preguntas.id', '=', 'intentos_preguntas.id_pregunta')
            ->join('tests', 'preguntas.id_test', '=', 'tests.id')
            ->where('intentos_preguntas.id_usuario', $idUsuario) // Add where clause
            ->select('intentos_preguntas.id_usuario', 'tests.nombre_test', 'intentos_preguntas.id_pregunta', 'preguntas.nombre_pregunta', 'intentos_preguntas.respuestas', 'intentos_preguntas.nota_pregunta as nota')
            ->get();

        return view('historialPreguntasRespondidas', ['preguntas' => $preguntas]);
    }
}
