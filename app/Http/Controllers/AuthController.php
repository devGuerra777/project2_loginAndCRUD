<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Método para iniciar sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Intenta autenticar al usuario
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->password === $request->password) {
            // Autenticación exitosa
            Auth::login($user);
            return response()->json(['message' => 'Login successful', 'user' => $user], 200);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
