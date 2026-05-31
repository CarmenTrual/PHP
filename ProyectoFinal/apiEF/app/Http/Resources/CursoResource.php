<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'categoria' => new CategoriaResource($this->categoria), //Obtiene la categoría a la que pertenece el curso.
            'nivel' => new NivelResource($this->nivel), // Obtiene el nivel al que pertenece el curso.
            'nombre_curso' => $this->nombre_curso,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // formateo para que no salgan los milisegundos y la z,
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
