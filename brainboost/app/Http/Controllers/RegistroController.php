<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        // Sacamos los datos del request
        $data = $request->validate([
            'nombre_usuario' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Creamos un hash del pass
        $data['password'] = Hash::make($data['password']);

        try {
            $user = Usuario::where('email', $data['email'])->first();

            if ($user) {
                // Buscamos al usuario y actualizamos los campos
                $user->nombre_usuario = $data['nombre_usuario'];
                $user->password = $data['password'];
                $user->save();
            } else {
                // Si el usuario no esta lo creamos
                $user = Usuario::create($data);
            }

            Auth::login($user);
            return redirect()->route('login')->with('success', 'Usuario creado o actualizado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('registro')->with('warning', 'Error al crear o actualizar el usuario');
        }
    }
//
//    public function registrar(Request $request)
//    {
//        // Retrieve the data from the request
//        $data = $request->validate([
//            'nombre_usuario' => 'required',
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        // Hash the password
//        $data['password'] = Hash::make($data['password']);
//
//        try {
//            $user = Usuario::create($data);
//
//            if ($user) {
//                Auth::login($user);
//                return redirect()->route('login')->with('success', 'Usuario creado correctamente');
//            } else {
//                return redirect()->route('registro')->with('warning', 'Error al iniciar sesión');
//            }
//        } catch (\Illuminate\Database\QueryException $e) {
//            return redirect()->route('registro')->with('warning', 'Error al crear el usuario');
//        }
//    }

    public function cambiarpassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
//            'nueva_password' => 'required|min:6|confirmed',
            'nueva_password' => 'required',
        ]);

        $user = Auth::user();
        $passwordMatch = Hash::check($request->password_actual, $user->password);
        if ($passwordMatch) {
            $user->password = Hash::make($request->nueva_password);
            $user->save();

            return redirect()->route('index')->with('success', 'Contraseña cambiada exitosamente');
        } else {
            return redirect()->back()->with('warning', 'La contraseña actual no coincide');
        }
    }
}
