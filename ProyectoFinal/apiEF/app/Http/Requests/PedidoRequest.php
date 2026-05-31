<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }
    public function rules(): array
    {
        return [
            'id_usuario' => 'required|integer|exists:users,id',
            'id_curso' => 'required|integer|exists:cursos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|max:20',
            'fecha' => 'required|date',
        ];
    }
}
