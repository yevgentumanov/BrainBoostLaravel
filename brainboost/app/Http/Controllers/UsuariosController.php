<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Auth\MustVerifyEmail;

class UsuariosController extends Controller
{
    use AuthorizesRequests, MustVerifyEmail;

    /**
     * Callback para auth con Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googleAuthCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $usuario = Usuario::where('email', $user->email)->first();

        if ($usuario) {
            // Usuario ya existe, actualizar los detalles
            $usuario->nombre_usuario = $user->name;
            $usuario->google_id = $user->id;
            $usuario->save();
        } else {
            // Usuario no existe, crear un nuevo usuario
            $usuario = Usuario::create([
                'nombre_usuario' => $user->name,
                'google_id' => $user->id,
                'email' => $user->email,
            ]);
        }

        Auth::login($usuario);
        return redirect('/');
    }

    /**
     * Autenticación y login en la aplicación.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logintoapp(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = Usuario::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('warning', 'Correo electrónico o contraseña no válidos');
        }
    }

    /**
     * Cerrar sesión de la aplicación.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salir()
    {
        Auth::logout();
        $cookie = Auth::guard()->getCookieJar()->forget(Auth::guard()->getRecallerName());
        return redirect()->route('index')->withCookie($cookie)->with('success', 'Cierre de sesión exitoso');
    }

    /**
     * Registrar un nuevo usuario en la aplicación.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
                // El usuario ya existe, verificar si la contraseña proporcionada coincide con la almacenada
                if (Hash::check($request->password, $user->password)) {
                    // Las contraseñas coinciden, actualizar los detalles del usuario
                    $user->nombre_usuario = $data['nombre_usuario'];
                    $user->password = $data['password'];
                    $user->save();
                } else {
                    // Las contraseñas no coinciden, devolver un error
                    return redirect()->route('index')->with('warning', 'Contraseña incorrecta');
                }
            } else {
                // El usuario no existe, crear un nuevo usuario
                $user = Usuario::create($data);
            }

            $user->sendEmailVerificationNotification(); // Enviar la notificación de verificación de correo electrónico

            Auth::login($user); // Iniciar sesión del usuario

            return redirect()->route('index')->with('success', 'Usuario creado o actualizado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('index')->with('warning', 'Error al crear o actualizar el usuario');
        }
    }

    /**
     * Cambiar la contraseña del usuario autenticado.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
