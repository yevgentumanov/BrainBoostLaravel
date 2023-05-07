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
        return view('preguntas', compact('pregunta'));
    }
}
