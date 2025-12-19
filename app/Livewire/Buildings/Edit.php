<?php

namespace App\Livewire\Buildings;

use App\Models\Building;
use Livewire\Component;

class Edit extends Component
{
    public string $name;
    public int $type_id;
    public string $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type_id' => 'required|exists:building_types,id',
        'description' => 'nullable|string',
    ];

    public Building $building;

    public function mount(Building $building)
    {
        $this->building = $building;
        $this->name = $building->name;
        $this->type_id = $building->type_id;
        $this->description = $building->description;
    }

    public function update()
    {
        $this->validate();

        $this->building->update([
            'name' => $this->name,
            'type_id' => $this->type_id,
            'description' => $this->description,
        ]);

        $this->redirectRoute('buildings.index');
    }

    public function render()
    {
        return view('livewire.buildings.edit')->with([
            'building' => $this->building,
        ]);
    }
}
