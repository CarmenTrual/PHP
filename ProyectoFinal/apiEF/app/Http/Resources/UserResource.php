<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_usuario' => $this->nombre_usuario,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'cursos_pedidos' => $this->pedidos != null ? $this->pedidos->pluck('curso.nombre_curso') : [], //obteniene 
            //todos los nombres de los cursos que el usuario ha pedido.
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // formateo para que no salgan los milisegundos y la z
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
