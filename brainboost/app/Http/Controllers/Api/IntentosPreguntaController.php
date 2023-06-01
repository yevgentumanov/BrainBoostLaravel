<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intentos_pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $data['nota'] = floatval($data['nota']); // Convert 'nota' to float

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
        for ($i = 21; $i < 31; $i++) {
            $fakeData = [
                'id_usuario' => 1,
                'id_pregunta' => $i,
                'intento' => 1,
                'nota' => 12.34,
                'fecha_realizacion' => now(),
                'respuestas' => '{"respuestas_correctas": "Claude Debussy"}',
                'dificultad' => 1,
                'modalidad' => 1,
                'tiempoInicio' => now(),
                'tiempoFin' => now(),
            ];
            $intentosPregunta = Intentos_pregunta::create($fakeData);
        }
        return "done";
    }
//
//    public function returnHistorial($idUsuario, $nombreUsuarioAccediendo)
//    {
//        $tests = DB::table('tests')
//            ->whereIn('id', function ($query) use ($idUsuario) {
//                $query->select('id_test')
//                    ->from('preguntas')
//                    ->whereIn('id', function ($subquery) use ($idUsuario) {
//                        $subquery->select('id_pregunta')
//                            ->from('intentos_preguntas')
//                            ->where('id_usuario', $idUsuario);
//                    });
//            })
//            ->pluck('nombre_test');
//        return view('historialTestRealizados', ['tests' => $tests]);
//    }

//    public function returnHistorial()
//    {
//        $intentosPreguntas = Intentos_pregunta::all();
//        $data = $intentosPreguntas->toArray();
//        return $data;
//
//    }
//    public function returnHistorial()
//    {
//        $intentosPreguntas = Intentos_pregunta::all();

//        $groupedData = [];
//        foreach ($intentosPreguntas as $item) {
//            $intento = $item->intento;
//            if (isset($groupedData[$intento])) {
//                $groupedData[$intento][] = $item;
//            } else {
//                $groupedData[$intento] = [$item];
//            }
//        }

//        $results = Intentos_pregunta::join('preguntas', 'preguntas.id', '=', 'intentos_preguntas.id_pregunta')
//            ->join('tests', 'preguntas.id_test', '=', 'tests.id')
//            ->select('intentos_preguntas.id_usuario', 'tests.nombre_test', 'intentos_preguntas.id_pregunta', 'preguntas.nombre_pregunta', 'intentos_preguntas.respuestas', 'intentos_preguntas.nota')
//            ->get();
//
//        return $results;
//        return $intentosPreguntas;
//    }




    public function returnHistorial($idUsuario, $nombreUsuarioAccediendo)
    {
        $tests = Intentos_pregunta::join('preguntas', 'preguntas.id', '=', 'intentos_preguntas.id_pregunta')
            ->join('tests', 'preguntas.id_test', '=', 'tests.id')
            ->select('intentos_preguntas.id_usuario', 'tests.nombre_test', 'intentos_preguntas.id_pregunta', 'preguntas.nombre_pregunta', 'intentos_preguntas.respuestas', 'intentos_preguntas.nota')
            ->get();

//        return view('historialTestRealizados', ['$tests' => $tests]);
        return view('historialTestRealizados', ['tests' => $tests]);

    }

    public function returnHistorialPreguntasRespondidas($idUsuario)
    {
        $preguntas = Intentos_pregunta::join('preguntas', 'preguntas.id', '=', 'intentos_preguntas.id_pregunta')
            ->join('tests', 'preguntas.id_test', '=', 'tests.id')
            ->where('intentos_preguntas.id_usuario', $idUsuario) // Add where clause
            ->select('intentos_preguntas.id_usuario', 'tests.nombre_test', 'intentos_preguntas.id_pregunta', 'preguntas.nombre_pregunta', 'intentos_preguntas.respuestas', 'intentos_preguntas.nota')
            ->get();
        return view('historialPreguntasRespondidas', ['preguntas' => $preguntas]);
    }

}
