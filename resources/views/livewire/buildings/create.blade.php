<?php

use App\Models\BuildingType;

?>

<div>
    <form wire:submit.prevent="create">
        <flux:input wire:model="name" type="text" placeholder="Name" />
        <flux:select wire:model="type_id" placeholder="Type">
            <option value="">Select type</option>
            @foreach (BuildingType::all() as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </flux:select>
        <flux:textarea wire:model="description" placeholder="Description" />
        <flux:button type="submit">Create</flux:button>
    </form>
</div>
