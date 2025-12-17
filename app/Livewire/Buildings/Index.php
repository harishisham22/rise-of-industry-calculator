<?php

namespace App\Livewire\Buildings;

use App\Models\Building;
use App\Models\BuildingType;
use Livewire\Component;

class Index extends Component
{
    public function listBuildingTypes()
    {
        return BuildingType::all();
    }

    public function listBuildings()
    {
        return Building::withAllRelations()->all();
    }

    public function render()
    {
        return view('livewire.buildings.index')->with([
            'building_types' => $this->listBuildingTypes(),
            'buildings' => $this->listBuildings(),
        ]);
    }
}
