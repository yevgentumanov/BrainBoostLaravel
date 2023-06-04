<?php

namespace App\Http\Controllers;

use App\Models\VIntentosTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VIntentosTestController extends Controller
{
    // Obtener el historial de test realizados por un usuario
    public function historialTestRealizados($idUsuarioAccediendo)
    {
        // Obtener todos los intentos de test realizados por el usuario especificado
        $historialTestRealizados = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)->get();

        // Retornar la vista 'historialTestRealizados' con los intentos de test realizados
        return view('historialTestRealizados', compact('historialTestRealizados'));
    }

    // Obtener los últimos test realizados por un usuario
    public function ultimosTestRealizados($idUsuarioAccediendo)
    {
        // Obtener los últimos 5 test realizados por el usuario especificado
        $tests = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->orderBy('fecha_realizacion', 'desc')
            ->orderBy('tiempo_fin', 'desc')
            ->limit(5)
            ->get();

        // Retornar la vista 'estadisticas' con los últimos test realizados
        return view('estadisticas', compact('tests'));
    }

    // Obtener los test más populares realizados
    public function popularesTestRealizados()
    {
        // Obtener los test más populares basados en la cantidad de intentos realizados
        $popularTests = VIntentosTest::select('id_test')
            ->groupBy('id_test')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        $tests = [];
        foreach ($popularTests as $test) {
            // Obtener los datos del test más reciente realizado para cada test popular
            $testData = VIntentosTest::where('id_test', $test->id_test)
                ->orderBy('fecha_realizacion', 'desc')
                ->orderBy('tiempo_fin', 'desc')
                ->first();

            if ($testData) {
                $tests[] = $testData;
            }
        }

        // Retornar la vista 'popularTests' con los test más populares realizados
        return view('popularTests', compact('tests'));
    }

    // Obtener la vista de la cuenta del usuario
    public function getCuentaView()
    {
        $idUsuarioAccediendo = Auth::id();

        // Obtener la nota media de los test realizados por el usuario
        $notaMedia = round(VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->avg('nota_test'), 2);

        // Obtener el número de test realizados por el usuario
        $numeroTestRealizados = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->count();

        // Obtener el nombre de la materia del test más repetido
        $nombreMateria = DB::table('intentos_tests')
            ->join('tests', 'intentos_tests.id_test', '=', 'tests.id')
            ->join('materias', 'tests.id', '=', 'materias.id')
            ->where('id_usuario', $idUsuarioAccediendo)
            ->groupBy('intentos_tests.id_test')
            ->orderByRaw('COUNT(*) DESC')
            ->value('materias.nombre_materia');

        // Obtener la última nota_test del último test realizado por el usuario
        $ultimaNota = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->orderBy('id', 'desc')
            ->value('nota_test');

        $ultimaNota = $ultimaNota !== null ? $ultimaNota : "N/A";

        // Obtener los últimos 5 test realizados por el usuario
        $ultimosTestRealizados = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->orderBy('fecha_realizacion', 'desc')
            ->orderBy('tiempo_fin', 'desc')
            ->limit(5)
            ->get();

        // Obtener los test más populares realizados
        $popularTests = VIntentosTest::select('id_test')
            ->groupBy('id_test')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        $popularTestResults = [];
        foreach ($popularTests as $test) {
            // Obtener los datos del test más reciente realizado para cada test popular
            $testData = VIntentosTest::where('id_test', $test->id_test)
                ->orderBy('fecha_realizacion', 'desc')
                ->orderBy('tiempo_fin', 'desc')
                ->first();

            if ($testData) {
                $popularTestResults[] = $testData;
            }
        }

        // Retornar la vista 'cuenta' con los últimos test realizados y los test más populares
        return view('cuenta', compact('nombreMateria', 'ultimaNota', 'ultimosTestRealizados', 'popularTestResults', 'notaMedia', 'numeroTestRealizados'));
    }
}
