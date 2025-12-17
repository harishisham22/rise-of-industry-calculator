<?php

namespace App\Livewire\Buildings;

use App\Models\Building;
use Livewire\Component;

class Create extends Component
{
    public string $name;
    public int $type_id;
    public string $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type_id' => 'required|exists:building_types,id',
        'description' => 'nullable|string',
    ];

    public function create()
    {
        $this->validate();

        Building::create([
            'name' => $this->name,
            'type_id' => $this->type_id,
            'description' => $this->description,
        ]);

        return view('livewire.buildings.index');
    }

    public function render()
    {
        return view('livewire.buildings.create');
    }
}
