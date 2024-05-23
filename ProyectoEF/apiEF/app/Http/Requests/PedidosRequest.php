<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosRequest extends FormRequest
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
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'id_curso' => 'required|integer|exists:cursos,id_curso',
            'cantidad' => 'required|integer',
            'estado' => 'required|max:20',
            'fecha' => 'required|date',
        ];
    }
}
