<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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
    public function logout()
    {
        Auth::logout();
        $cookie = Auth::guard()->getCookieJar()->forget(Auth::guard()->getRecallerName());
        return redirect()->route('index')->withCookie($cookie)->with('success', 'Logged out successfully');
    }
}
