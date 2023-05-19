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
    public function index()
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
    public function show(Request $request, string $id_test = null)
    {
        if (!isset($id_test)) {
            $id_test = $request->get("id");
        }
        if (!isset($id_test) && !isset($id_test)) { // esto no tiene sentido...
            return $this->index();
        }

//        return Pregunta::find($id_test);
        $preguntas = Pregunta::where('id_test', $id_test)->get();

        return response()->json($preguntas);
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
