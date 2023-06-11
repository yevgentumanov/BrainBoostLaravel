<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Events\Verified;

class UsuariosController extends Controller
{
//    use AuthorizesRequests;
    use AuthorizesRequests, MustVerifyEmail;

    public function googleAuthCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $usuario = Usuario::where('email', $user->email)->first();

        if ($usuario) {
            $usuario->nombre_usuario = $user->name;
            $usuario->google_id = $user->id;
            $usuario->save();
        } else {
            $usuario = Usuario::create([
                'nombre_usuario' => $user->name,
                'google_id' => $user->id,
                'email' => $user->email,
            ]);
        }

        Auth::login($usuario);
        return redirect('/');
    }

    public function logintoapp(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = Usuario::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('warning', 'Invalid email or password');
        }
    }

    public function salir()
    {
        Auth::logout();
        $cookie = Auth::guard()->getCookieJar()->forget(Auth::guard()->getRecallerName());
        return redirect()->route('index')->withCookie($cookie)->with('success', 'Logged out successfully');
    }

    public function registrar(Request $request)
    {
        $data = $request->validate([
            'nombre_usuario' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        try {
            $user = Usuario::where('email', $data['email'])->first();

            if ($user) {
                // User already exists, check if the provided password matches the stored password
                if (Hash::check($request->password, $user->password)) {
                    // Passwords match, update the user's details
                    $user->nombre_usuario = $data['nombre_usuario'];
                    $user->password = $data['password'];
                    $user->save();
                } else {
                    // Passwords do not match, return an error
                    return redirect()->route('index')->with('warning', 'Contraseña incorrecta');
                }
            } else {
                // User does not exist, create a new user
                $user = Usuario::create($data);
            }

            $user->sendEmailVerificationNotification(); // Send the email verification notification

            Auth::login($user); // Log in the user

            return redirect()->route('index')->with('success', 'Usuario creado o actualizado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('index')->with('warning', 'Error al crear o actualizar el usuario');
        }
    }

    public function cambiarpassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
            'nueva_password' => 'required|min:6|confirmed',
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
