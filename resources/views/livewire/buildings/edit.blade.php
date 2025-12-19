<div>
    <flux:modal name="edit-building" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit building</flux:heading>
                <flux:text class="mt-2">Make changes to your building details.</flux:text>
            </div>

            <flux:input label="Name" placeholder="Building name" wire:model="name" />

            <flux:select label="Type" placeholder="Building type" wire:model="type_id">
                <option value="">Select type</option>
                @foreach ($building_types as $type)
                    <option value="{{ $type->id }}">{{ strtoupper($type->name) }}</option>
                @endforeach
            </flux:select>

            <flux:input label="Description" placeholder="Building description" wire:model="description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal name="edit-building" wire:model="showEditModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit building</flux:heading>
                <flux:text class="mt-2">Make changes to your building details.</flux:text>
            </div>

            <flux:input label="Name" placeholder="Building name" wire:model="editingBuilding.name" />
            <flux:select label="Type" placeholder="Building type" wire:model="editingBuilding.type_id">
                @foreach ($building_types as $type)
                    <option value="{{ $type->id }}">{{ strtoupper($type->name) }}</option>
                @endforeach
            </flux:select>
            <flux:input label="Description" placeholder="Building description"
                wire:model="editingBuilding.description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>