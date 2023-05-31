<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IntentosPreguntaController extends Controller
{
    public function index()
    {
        $intentosPreguntas = Intentos_pregunta::all();
        return response()->json(['data' => $intentosPreguntas], 200);
    }

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
        $fakeData = [
            'id_usuario' => random_int(1, 4),
            'id_pregunta' => random_int(1, 2300),
            'intento' => 1,
            'nota' => random_int(1, 10),
            'fecha_realizacion' => now(),
            'respuestas' => '{"respuestas": ["Claude Debussy", "Johann Sebastian Bach", "Wolfgang Amadeus Mozart", "Ludwig van Beethoven"], "respuestas_correctas": "Claude Debussy"}',
            'dificultad' => 1,
            'modalidad' => 1,
            'tiempoInicio' => now(),
            'tiempoFin' => now(),
        ];

        $intentosPregunta = Intentos_pregunta::create($fakeData);
        return "done";
    }

    public function returnHistorial($idUsuario, $nombreUsuarioAccediendo)
    {
        $tests = DB::table('tests')
            ->whereIn('id', function ($query) use ($idUsuario) {
                $query->select('id_test')
                    ->from('preguntas')
                    ->whereIn('id', function ($subquery) use ($idUsuario) {
                        $subquery->select('id_pregunta')
                            ->from('intentos_preguntas')
                            ->where('id_usuario', $idUsuario);
                    });
            })
            ->pluck('nombre_test');
        return view('historialTestRealizados', ['tests' => $tests]);
    }

}
