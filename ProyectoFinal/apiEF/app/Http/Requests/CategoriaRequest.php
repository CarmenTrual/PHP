<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|max:100',
        ];
    }
}
