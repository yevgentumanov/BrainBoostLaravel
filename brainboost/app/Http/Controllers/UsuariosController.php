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

        $usuario = Usuario::updateOrCreate(
            ['google_id' => $user->id],
            [
                'nombre_usuario' => $user->name,
                'email' => $user->email,
            ]
        );

        Auth::login($usuario);

        return redirect('/');
    }
}
