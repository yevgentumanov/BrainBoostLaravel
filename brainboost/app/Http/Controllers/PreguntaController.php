<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function showFirst()
    {
        $pregunta = Pregunta::first();
        $originalArray = $pregunta->getOriginal(); // Access the #original array
        // $json = json_encode($originalArray); // Convert the array to JSON

        return response()->json($originalArray);
        // return view('preguntas', compact('json'));
    }

}
