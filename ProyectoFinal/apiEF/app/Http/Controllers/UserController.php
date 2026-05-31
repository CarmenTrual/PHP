<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        return response()->json(User::all());
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_usuario' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|min:15',
        ]);

        $user = User::create([
            'nombre_usuario' => $validatedData['nombre_usuario'],
            'apellidos' => $validatedData['apellidos'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json($user, 201);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'nombre_usuario' => 'sometimes|required|string|max:30',
                'apellidos' => 'sometimes|required|string|max:30',
                'email' => 'sometimes|required|string|email|max:30|unique:users,email,' . $id,
                'password' => 'sometimes|required|string|min:15',
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($validatedData);
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado']);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    //Para el test
    // Mostrar el perfil del usuario autenticado 
    public function perfilUsuario(Request $request) { 
        $user = $request->user(); 
        return response()->json(['user' => $user], 200); } 
        
    // Actualizar el perfil del usuario autenticado 
    public function perfilUpdate(Request $request) { 
        $user = $request->user(); 
        $validatedData = $request->validate(
            [ 
            'nombre_usuario' => 'required|string|max:30', 
            'apellidos' => 'required|string|max:30', 
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, 
            ]); 
            
        $user->update($validatedData); 
        return response()->json(['user' => $user], 200); } 
            
    // Eliminar el perfil del usuario autenticado 
    public function perfilDelete(Request $request) { 
        $user = $request->user(); 
        $user->delete(); return response()->json(
            [
                'message' => 'Usuario eliminado correctamente'
            ], 200); } 
}

