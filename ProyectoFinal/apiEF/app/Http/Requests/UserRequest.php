<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }
    public function rules(): array
    {
        return [
            'nombre_usuario' => 'required|string|max:30',
            'password' => 'required|string|min:8|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|email|string|max:30|unique:users,email',
        ];
    }
}
