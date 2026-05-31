<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NivelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nivel' => $this->nivel,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // formateo para que no salgan los milisegundos y la z
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
