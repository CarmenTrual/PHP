<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }
    public function rules(): array
    {
        return [
            'id_categoria' => 'required|integer|exists:categoria,id',
            'id_nivel' => 'required|integer|exists:niveles,id',
            'nombre_curso' => 'required|string|max:30',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ];
    }
}
