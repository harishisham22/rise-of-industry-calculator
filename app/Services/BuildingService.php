<?php

namespace App\Services;

use App\Models\Building;

class BuildingService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function produce(Building $building, array $items)
    {
        $building->produceItems()->sync($items);

        return $building;
    }
}
