<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NivelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite la solicitud para cualquier usuario autenticado
        //return auth()->check(); // Autoriza la solicitud si está logueado
    }
    public function rules(): array
    {
        return [
            'nivel' => 'required|string|max:20',
        ];
    }
}
