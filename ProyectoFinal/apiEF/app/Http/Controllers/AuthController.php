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
        try {
            $validatedData = $request->validate([
                'nombre_usuario' => 'required|string|max:30',
                'apellidos' => 'required|string|max:30',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:15',
            ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'message' => 'El correo electrónico ya está registrado. Por favor, usa otro.',
                    'errors' => ['email' => ['Este email ya está registrado.']],
                ], 422);
            }

        try {
            $user = User::create([
                'nombre_usuario' => $validatedData['nombre_usuario'],
                'apellidos' => $validatedData['apellidos'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Usuario registrado correctamente. ¡Bienvenido/a!',
                'user' => [ 
                    'id' => $user->id, 
                    'nombre_usuario' => $user->nombre_usuario, 
                    'apellidos' => $user->apellidos, 
                    'email' => $user->email, 
                    'created_at' => $user->created_at->format('Y-m-d H:i:s'), 
                    'updated_at' => $user->updated_at->format('Y-m-d H:i:s'), 
                ], 
                    'token' => $token
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error al registrar el usuario: ' . $e->getMessage());
            return response()->json(['error' => 'Error al registrar el usuario'], 500);
        }
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => '¡Bienvenido/a!',
            'access_token' => $token,
            'token_type' => 'Bearer',]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}
