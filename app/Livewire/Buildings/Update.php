<?php

namespace App\Livewire\Buildings;

use App\Models\Building;
use Livewire\Component;

class Update extends Component
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
    }

    public function update()
    {
        $this->validate();

        $this->building->update([
            'name' => $this->name,
            'type_id' => $this->type_id,
            'description' => $this->description,
        ]);

        return view('livewire.buildings.index');
    }

    public function render()
    {
        return view('livewire.buildings.update')->with([
            'building' => $this->building,
        ]);
    }
}
