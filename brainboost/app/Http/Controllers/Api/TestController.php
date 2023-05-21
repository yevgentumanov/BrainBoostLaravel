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
     * Display a listing of the resource.
     */
    public function index()
    {
        return Test::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id = null) // devuelve las preguntas con ID indicado o todas las preguntas
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

        /*
         * REFACTORIZAR EN EL FUTURO PARA USAR LA RELACION ENTRE MODELOS
         *
        $test = Test::with('usuario')->where('id', $id)->first();

        $cant_preguntas = Pregunta::where('id_test', $id)->count();

        $test->cant_preguntas = $cant_preguntas;
        $test->nombreUsuarioCreador = $test->usuario->nombre_usuario;

        // Removemos el campo 'usuario' del modelo para evitar que se incluya en la respuesta JSON
        unset($test->usuario);
        */
        return response()->json($test);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
