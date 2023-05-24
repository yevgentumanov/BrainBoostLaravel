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
        if ($user && $this->validatePassword($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('login')->with('success', 'Logged in successfully');
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

    private function validatePassword($inputPassword, $dbPassword)
    {
        // Implement your password validation logic here
        // You may use Laravel's built-in Hash::check() method or any other method of your choice
        if ($inputPassword == $dbPassword) {
            return true;
        } else {
            return false;
        }
    }
}
