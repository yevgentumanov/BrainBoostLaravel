<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VIntentosTest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class VIntentosTestController extends Controller
{
    public function historialTestRealizados($idUsuarioAccediendo)
    {
        $historialTestRealizados = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)->get();
        return view('historialTestRealizados', compact('historialTestRealizados'));
    }

    public function ultimosTestRealizados($idUsuarioAccediendo)
    {
        $tests = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->orderBy('fecha_realizacion', 'desc')
            ->orderBy('tiempo_fin', 'desc')
            ->limit(5)
            ->get();

        return view('estadisticas', compact('tests'));
    }

    public function popularesTestRealizados()
    {
        $popularTests = VIntentosTest::select('id_test')
            ->groupBy('id_test')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        $tests = [];
        foreach ($popularTests as $test) {
            $testData = VIntentosTest::where('id_test', $test->id_test)
                ->orderBy('fecha_realizacion', 'desc')
                ->orderBy('tiempo_fin', 'desc')
                ->first();

            if ($testData) {
                $tests[] = $testData;
            }
        }

        return view('popularTests', compact('tests'));
    }

    public function getCuentaView()
    {
        $idUsuarioAccediendo = Auth::id();

        $ultimosTestRealizados = VIntentosTest::where('id_usuario', $idUsuarioAccediendo)
            ->orderBy('fecha_realizacion', 'desc')
            ->orderBy('tiempo_fin', 'desc')
            ->limit(5)
            ->get();

        $popularTests = VIntentosTest::select('id_test')
            ->groupBy('id_test')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        $popularTestResults = [];
        foreach ($popularTests as $test) {
            $testData = VIntentosTest::where('id_test', $test->id_test)
                ->orderBy('fecha_realizacion', 'desc')
                ->orderBy('tiempo_fin', 'desc')
                ->first();

            if ($testData) {
                $popularTestResults[] = $testData;
            }
        }

//        dd($ultimosTestRealizados);
        return view('cuenta', compact('ultimosTestRealizados', 'popularTestResults'));
    }
}
