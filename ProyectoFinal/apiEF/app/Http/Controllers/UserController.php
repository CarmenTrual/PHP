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

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'nombre_usuario' => 'sometimes|required|string|max:30',
                'apellidos' => 'sometimes|required|string|max:30',
                'email' => 'sometimes|required|string|email|max:30|unique:users,email,' . $id,
                'contraseña' => 'sometimes|required|string|min:15',
            ]);

            if (isset($validatedData['contraseña'])) {
                $validatedData['contraseña'] = Hash::make($validatedData['contraseña']);
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
}

