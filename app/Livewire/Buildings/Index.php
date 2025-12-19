<?php

namespace App\Livewire\Buildings;

use App\Models\Building;
use App\Models\BuildingType;
use Livewire\Component;

class Index extends Component
{
    public bool $showEditModal = false;
    public ?Building $building = null;

    public function edit($id)
    {
        $this->building = Building::findOrFail($id);
        $this->showEditModal = true;
    }

    public function confirmDelete($id)
    {
        $this->building = Building::findOrFail($id);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->building->delete();
        $this->showDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.buildings.index', [
            'building_types' => BuildingType::all(),
            'buildings' => Building::with('buildingType')->get(),
        ]);
    }
}