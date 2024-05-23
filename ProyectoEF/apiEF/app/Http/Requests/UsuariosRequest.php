<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_usuario' => 'required|max:30',
            'contraseña' => 'required|max:15',
            'apellidos' => 'required|max:30',
            'email' => 'required|email|max:30|unique:usuarios,email',
        ];
    }
}
