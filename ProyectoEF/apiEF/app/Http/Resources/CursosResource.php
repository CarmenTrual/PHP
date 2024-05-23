<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_curso,
            'categoria' => new CategoriaResource($this->categoria), //Obtiene la categoría a la que pertenece el curso.
            'nivel' => new NivelesResource($this->nivel), // Obtiene el nivel al que pertenece el curso.
            'nombre_curso' => $this->nombre_curso,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
        ];
    }
}
