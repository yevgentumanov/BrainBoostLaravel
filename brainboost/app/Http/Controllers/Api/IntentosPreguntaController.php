<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_test;
use App\Models\Intentos_pregunta;
use App\Models\Test;
use Illuminate\Http\Request;

class IntentosPreguntaController extends Controller
{
    public function index()
    {
        $intentosPreguntas = Intentos_pregunta::all();
        return response()->json(['data' => $intentosPreguntas], 200);
    }

    public function store(Request $request)
    {
    // Obtener el ID del usuario autenticado
        $userId = $request->user()->id;
        $datosTest = [
            'id_test' => $request->id_test,
            'id_usuario' => $userId,
            'intento' => null, // Esto se crea mediante el trigger de Juan Carlos
            'fecha_realizacion' => now(),
            'dificultad' => $request->dificultad,
            'modalidad' => $request->modalidad,
            'tiempo_inicio' => $request->tiempoInicio,
            'tiempo_fin' => $request->tiempoFin,
        ];
        $intentosTest = Intentos_test::create($datosTest);
        // /*-- Encontrar el último test creado por el usuario --*/
        $lastTest = Intentos_test::where('id_usuario', $userId)
            ->orderBy('id', 'desc')
            ->first();

        /*-- Reemplazar "id_intento_test": "id_test_creado" con el ID del último test creado --*/
        $preguntasTestRealizado = $request->preguntasTestRealizado;
        foreach ($preguntasTestRealizado as $preguntaData) {

            $preguntaData['id_intento_test'] = $lastTest->id;

            $pregunta = new Intentos_pregunta([
                'id_intento_test' => $preguntaData['id_intento_test'],
                'id_pregunta' => $preguntaData['id_pregunta'],
                'nota_pregunta' => isset($preguntaData['nota_pregunta']) && $preguntaData['nota_pregunta'] != null ? (float)$preguntaData['nota_pregunta'] : 0.0,
                'respuestas' => json_encode($preguntaData['respuestas']),
            ]);

            $pregunta->save();
        }

        /*-- Devolver los datos de la respuesta --*/
        return response()->json([
            'datosTest' => $datosTest,
            'preguntasTestRealizado' => $preguntasTestRealizado
        ]);
    }

//
//    public function store(Request $request)
//    {
//        // Get the user ID from the authenticated user
//        $userId = $request->user()->id;
//        $datosTest = [
//            'id_test' => $request->id_test,
//            'id_usuario' => $userId,
//            'intento' => null, // Esto se crea mediante el trigger de Juan Carlos
//            'fecha_realizacion' => now(),
//            'dificultad' => $request->dificultad,
//            'modalidad' => $request->modalidad,
//            'tiempo_inicio' => $request->tiempoInicio,
//            'tiempo_fin' => $request->tiempoFin,
//        ];
//        $intentosTest = Intentos_test::create($datosTest);
//
//        // /*-- Find the last created test for the user --*/
//        $lastTest = Intentos_test::where('id_usuario', $userId)
//            ->orderBy('id', 'desc')
//            ->first(); // Comentado by Santi
//
//        /*-- Replace "id_intento_test": "id_test_creado" with the ID of the last created test --*/
//        $preguntasTestRealizado = $request->preguntasTestRealizado;
//        foreach ($preguntasTestRealizado as $preguntaData) {
//
//            $preguntaData['id_intento_test'] = $lastTest->id; // Comentado by Santi
//
//            $pregunta = new Intentos_pregunta([
//                'id_intento_test' => $preguntaData['id_intento_test'], // Comentado by Santi
//                'id_pregunta' => $preguntaData['id_pregunta'],
//                'nota_pregunta' => isset($preguntaData['nota_pregunta']) && $preguntaData['nota_pregunta'] != null ? (float)$preguntaData['nota_pregunta'] : 0.0,
//                'respuestas' => json_encode($preguntaData['respuestas']),
//            ]);
//
//            $pregunta->save();
//        }
//
//        /*-- Return the response data --*/
//        return response()->json([
//            'datosTest' => $datosTest,
//            'preguntasTestRealizado' => $preguntasTestRealizado
//        ]);
//    }

    public function preguntasRealizadasIntento(Request $request)
    {
        $userId = $request->user()->id;

        $testId = $request->input('id_test');
        $intento = $request->input('intento');

        // Unir la tabla "intentos_tests" con "intentos_preguntas" utilizando la columna "id" de la primera y "id_intento_test" de la segunda
        $intentosPreguntas = Intentos_test::join('intentos_preguntas', 'intentos_tests.id', '=', 'intentos_preguntas.id_intento_test')
            ->where('intentos_tests.id_usuario', $userId)
            ->where('intentos_tests.id_test', $testId)
            ->where('intentos_tests.intento', $intento)
            // ->orderBy('intentos_preguntas.id') // Para que me devuelva las preguntas en el mismo orden en el que le aparecieron al usuario cuando hizo el test
            ->select(
                'intentos_tests.id_usuario',
                'intentos_tests.id_test',
                'intentos_tests.intento',
                'intentos_tests.dificultad',
                'intentos_tests.modalidad',
                'intentos_tests.fecha_realizacion',
                'intentos_tests.tiempo_inicio',
                'intentos_tests.tiempo_fin',
                'intentos_preguntas.id_pregunta',
                'intentos_preguntas.nota_pregunta',
                'intentos_preguntas.respuestas'
            )
            ->get();

        return response()->json(['data' => $intentosPreguntas], 200);
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
