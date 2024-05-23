<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuariosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * //@return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_usuario,
            'nombre_usuario' => $this->nombre_usuario,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'cursos_pedidos' => $this->pedidos != null ? $this->pedidos->pluck('curso.nombre_curso') : [], //obteniene 
            //todos los nombres de los cursos que el usuario ha pedido.
        ];
    }
}
