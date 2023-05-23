<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // devuelve todas las preguntas
    {
        return Pregunta::all();
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
    public function show(Request $request, string $id_test = null) // devuelve las preguntas con ID indicado o todas las preguntas
    {
        if (!isset($id_test)) {
            $id_test = $request->get("id");
        }
        if (!isset($id_test)) {
            return $this->index();
        }

        $preguntas = Pregunta::where('id_test', $id_test)->get();
        if (sizeof($preguntas) > 0) {
            return response()->json($preguntas);
        } else {
            abort(404);
        }
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
