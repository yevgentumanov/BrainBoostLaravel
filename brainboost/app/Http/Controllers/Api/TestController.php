<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Pregunta;
use App\Models\Usuario;

class TestController extends Controller
{
    /**
     * Muestra una lista de todos los tests.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Test::all();
    }

    /**
     * Muestra el test especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, string $id = null)
    {
        if (!isset($id)) {
            $id = $request->get("id");
        }

        if (!isset($id)) {
            return $this->index();
        }

        $test = Test::where('id', $id)->first();

        $idUsuarioCreador = $test->id_usuario_creador;
        $nombreUsuarioCreador = Usuario::where('id', $idUsuarioCreador)->first();
        $nombreUsuarioCreador = $nombreUsuarioCreador->nombre_usuario;

        $cant_preguntas = Pregunta::where('id_test', $id)->count();

        $test->cant_preguntas = $cant_preguntas;
        $test->nombreUsuarioCreador = $nombreUsuarioCreador;

        return response()->json($test);
    }

}
