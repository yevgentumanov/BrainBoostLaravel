<!---->
<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Controllers\Controller;
//use App\Models\Test;
//use App\Models\Pregunta;
//use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Builder;
//
//
//class TestController extends Controller
//{
//    public function incrementarVisitas($id)
//    {
//        $test = Test::findOrFail($id);
//        $test->increment('numero_visitas');
//
//        return response()->json(['message' => 'Visits incremented successfully.']);
//    }
//    public function showTest(Request $request) {
//        /*-- Variables --*/
//        $idTest = $request->idTest; // Recupera el id del test del parámetro de la ruta
//        // $test = Test::find($idTest); // Obtención de los datos del test
//        $preguntas = Pregunta::where('id_test', $idTest)->get(); // Obtención de las preguntas del test
//        if (sizeof($preguntas) > 0) {
//            // return view("test", ['test' => $test, 'preguntas' => $preguntas]);
//            return view("test");
//        } else {
//            abort(404);
//        }
//    }
//
//    /**
//     * @deprecated
//     */
//    public function showFirstTest()
//    {
//        $test = Test::first();
//        if ($test) {
//            return $test;
//        } else {
//            return "No tests found.";
//        }
//    }
//
//    /**
//     * @deprecated
//     */
//    public function showTestListArtes()
//    {
//        $tests = Test::where('id_materia', 1)->get();
//        return view('materias', ['tests' => $tests]);
//    }
//    /**
//     * @deprecated
//     */
//    public function showTestListMusica()
//    {
//        $tests = Test::where('id_materia', 2)->get();
//        return view('materias.musica', ['tests' => $tests]);
//    }
//    /**
//     * @deprecated
//     */
//    public function showTestListCienciasNaturales()
//    {
//        $tests = Test::where('id_materia', 5)->get();
//        return view('materias.сienciasNaturales', ['tests' => $tests]);
//    }
//    /**
//     * @deprecated
//     */
//    public function showTestListMatematicas()
//    {
//        $tests = Test::where('id_materia', 18)->get();
//        return view('materias.matematicas', ['tests' => $tests]);
//    }
//
//}
