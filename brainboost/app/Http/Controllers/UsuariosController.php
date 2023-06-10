<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UsuariosController extends Controller
{
    public function showFirst()
    {
        $usuario = Usuario::first();
        return $usuario;
    }

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

}
