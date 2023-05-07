<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function showFirst()
    {
        $usuario = Usuario::first();
        return $usuario;
    }
}
