<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_pedido,
            'usuario' => new UserResource($this->usuario), //Obtiene el usuario que ha hecho el pedido.
            'curso' => new CursoResource($this->curso), // Obtiene el curso que se ha pedido.
            'cantidad' => $this->cantidad,
            'estado' => $this->estado,
            'fecha' => $this->fecha,
        ];
    }
}
