<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        // Retrieve the data from the request
//        $data = $request->only([
//            'nombre_usuario',
//            'email',
//            'password',
//        ]);

        // Retrieve the data from the request
        $data = $request->validate([
            'nombre_usuario' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Create a new user in the database
        try {
        $user = Usuario::create($data);

//        if ($user) {
//            Auth::login($user);
//            return redirect()->route('login')->with('success', 'Usuario creado y logueado correctamente');
//        } else {
//            return redirect()->route('registro')->with('warning', 'Error al crear el usuario');
//        }

            if ($user) {
                Auth::login($user);
                return redirect()->route('login')->with('success', 'Usuario creado correctamente');
            } else {
                return redirect()->route('registro')->with('warning', 'Error al iniciar session');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route('registro')->with('warning', 'Error al crear el usuario');
        }
    }
}
