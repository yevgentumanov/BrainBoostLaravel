<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Materia::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id = null) // devuelve las materias con ID indicado o todas
    {
        if (!isset($id)) {
            $id = $request->get("id");
        }
        if (!isset($id)) {
            return $this->index();
        }

        $materia = Materia::where('id', $id)->get();

        return response()->json($materia);
    }

    public function showCategoria(Request $request, string $id_categoria = null) // devuelve las materias de categoria indicada
    {
        if (!isset($id_categoria)) {
            $id_categoria = $request->get("id_categoria");
        }
        if (!isset($id_categoria)) {
            return $this->index();
        }

        $materias = Materia::where('id_categoria', $id_categoria)->get();

        return response()->json($materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
