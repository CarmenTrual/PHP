<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
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
            'id_categoria' => 'required|integer|exists:categoria,id_categoria',
            'id_nivel' => 'required|integer|exists:niveles,id_nivel',
            'nombre_curso' => 'required|string|max:30',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ];
    }
}
