<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\test_usuario;
use Illuminate\Http\Request;

class TestUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testUsuarios = test_usuario::all();

        return response()->json($testUsuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $testUsuario = test_usuario::create($data);

        return response()->json($testUsuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testUsuario = test_usuario::findOrFail($id);

        return response()->json($testUsuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testUsuario = test_usuario::findOrFail($id);
        $data = $request->all();

        $testUsuario->update($data);

        return response()->json($testUsuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testUsuario = test_usuario::findOrFail($id);

        $testUsuario->delete();

        return response()->json(null, 204);
    }
}
