<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CriterioEvaluacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'resultado_aprendizaje_id' => $this->resultado_aprendizaje_id,
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'peso_porcentaje' => $this->peso_porcentaje,
            'orden' => $this->orden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
