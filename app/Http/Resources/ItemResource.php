<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->name,
            'type_id' => $this->type_id,
            'type' => $this->type,
            'description' => $this->description,
            'requireMaterials' => $this->requireMaterials,
            'producedBy' => $this->producedBy,
            'requiredBy' => $this->requiredBy,
            'storedBy' => $this->storedBy,
        ];
    }
}
