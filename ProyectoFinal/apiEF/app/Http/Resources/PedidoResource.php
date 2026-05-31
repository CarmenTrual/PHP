<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'usuario' => new UserResource($this->usuario), //Obtiene el usuario que ha hecho el pedido.
            'curso' => new CursoResource($this->curso), // Obtiene el curso que se ha pedido.
            'cantidad' => $this->cantidad,
            'estado' => $this->estado,
            'fecha' => $this->fecha,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // formateo para que no salgan los milisegundos y la z
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
