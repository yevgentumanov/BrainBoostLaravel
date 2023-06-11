<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;

class MateriasController extends Controller
{
    /**
     * Muestra una lista de todas las materias.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Materia::all();
    }

    /**
     * Muestra los detalles de una materia específica.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null $id
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

        $materia = Materia::where('id', $id)->get();

        return response()->json($materia);
    }

    /**
     * Muestra las materias de una categoría específica.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null $id_categoria
     * @return \Illuminate\Http\JsonResponse
     */
    public function showCategoria(Request $request, string $id_categoria = null)
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
}
