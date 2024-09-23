<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_usuario' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'contraseña' => 'required|string|min:15',
        ]);

        $user = User::create([
            'nombre_usuario' => $validatedData['nombre_usuario'],
            'apellidos' => $validatedData['apellidos'],
            'email' => $validatedData['email'],
            'contraseña' => Hash::make($validatedData['contraseña']),
        ]);

        return response()->json($user, 201);
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'contraseña');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Sesión cerrada.']);
    }
}
