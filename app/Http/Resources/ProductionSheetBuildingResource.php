<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductionSheetBuildingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'building_id' => $this->building->id,
            'quantity' => $this->quantity,
            'building' => BuildingResource::make($this->building),
        ];
    }
}
