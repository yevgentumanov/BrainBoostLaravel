<?php

namespace App\Http\Controllers;

use App\Models\Intentos_test;
use Illuminate\Http\Request;
use App\Models\Intentos_pregunta;

class Intentos_testController extends Controller
{
    public function index()
    {
        $tests = Intentos_test::with('test')->get();
//        dd($tests);
        return view('historialTestRealizados', compact('tests'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_test' => 'required|integer',
            'id_usuario' => 'required|integer',
            'intento' => 'nullable|integer',
            'fecha_realizacion' => 'nullable|date',
            'dificultad' => 'nullable|integer',
            'modalidad' => 'nullable|integer',
            'tiempo_inicio' => 'nullable|date',
            'tiempo_fin' => 'nullable|date',
        ]);

        $data['nota_test'] = 0.0; // Set the initial value for 'nota_test'

        $intentosTest = Intentos_test::create($data);
        return response()->json(['message' => 'Registro guardado correctamente', 'data' => $intentosTest], 201);
    }

    public function show(Request $request, string $id)
    {
        $intentosTest = Intentos_test::find($id);

        if (!$intentosTest) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['data' => $intentosTest], 200);
    }

    public function update(Request $request, string $id)
    {
        $intentosTest = Intentos_test::find($id);

        if (!$intentosTest) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $data = $request->validate([
            'id_test' => 'integer',
            'id_usuario' => 'integer',
            'intento' => 'nullable|integer',
            'fecha_realizacion' => 'nullable|date',
            'dificultad' => 'nullable|integer',
            'modalidad' => 'nullable|integer',
            'tiempo_inicio' => 'nullable|date',
            'tiempo_fin' => 'nullable|date',
        ]);

        $intentosTest->update($data);
        return response()->json(['message' => 'Registro actualizado', 'data' => $intentosTest], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $intentosTest = Intentos_test::find($id);

        if (!$intentosTest) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $intentosTest->delete();
        return response()->json(['message' => 'Registro eliminado'], 200);
    }

//    public function addFakeData()
//    {
//        for ($i = 1; $i <= 10; $i++) {
//            $fakeData = [
//                'id_test' => $i,
//                'id_usuario' => 1,
//                'intento' => 1,
//                'fecha_realizacion' => now(),
//                'dificultad' => 1,
//                'modalidad' => 1,
//                'tiempo_inicio' => now(),
//                'tiempo_fin' => now(),
//            ];
//            $intentosTest = Intentos_test::create($fakeData);
//        }
//        return "Fake data added successfully";
//    }
    public function addFakeData()
    {
        for ($i = 1; $i <= 10; $i++) {
            $fakeData = [
                'id_test' => $i,
                'id_usuario' => 1,
                'intento' => 1,
                'fecha_realizacion' => now(),
                'dificultad' => 1,
                'modalidad' => 1,
                'tiempo_inicio' => now(),
                'tiempo_fin' => now(),
            ];
            $intentosTest = Intentos_test::create($fakeData);

            // Create 10 intentos_preguntas records for each intentos_test
            for ($j = 1; $j <= 10; $j++) {
                $intentosPreguntaData = [
                    'id_intento_test' => $intentosTest->id,
                    'id_pregunta' => $j,
                    'nota_pregunta' => 1,
                    'respuestas' => '{"respuestas_correctas": "Claude Debussy"}',
                ];
                Intentos_pregunta::create($intentosPreguntaData);
            }
        }
        return "Fake data added successfully";
    }
}
