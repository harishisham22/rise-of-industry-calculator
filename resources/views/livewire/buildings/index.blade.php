<div class="space-y-4">
    <div class="flex justify-between items-center">
        <flux:input wire:model.live="search" type="search" placeholder="Search buildings..." class="max-w-lg" />
        <flux:select wire:model.live="type" placeholder="Select type..." class="max-w-sm">
            <option value="">All</option>
            @foreach ($building_types as $type)
                <option value="{{ $type->id }}">{{ strtoupper($type->name) }}</option>
            @endforeach
        </flux:select>
        <flux:button wire:click="buildings.create" class="">Create Building</flux:button>
    </div>

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="border-b">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($buildings as $building)
                    <tr class="border-b py-2 px-2">
                        <td>{{ strtoupper($building->name) }}</td>
                        <td>{{ $building->description ?? '-' }}</td>
                        <td>{{ strtoupper($building->buildingType->name) }}</td>
                        <td>
                            <div class="flex justify-end gap-4">
                                <flux:button icon="pencil-square" wire:click="edit({{ $building->id }})" />
                                <flux:modal name="edit-building-{{ $building->id }}" wire:model="showEditModal" :dismissible="false">
                                    <div class="space-y-6">
                                        <div>
                                            <flux:heading size="lg">Edit building</flux:heading>
                                            <flux:text class="mt-2">Make changes to your building details.</flux:text>
                                        </div>

                                        <flux:input label="Name" placeholder="Enter building name"
                                            wire:model="{{ $building->name }}" />
                                        <flux:select label="Type" wire:model="{{ $building->building_type_id }}"
                                            placeholder="Select building type">
                                            @foreach ($building_types as $type)
                                                <option value="{{ $type->id }}">{{ strtoupper($type->name) }}</option>
                                            @endforeach
                                        </flux:select>
                                        <flux:textarea label="Description" placeholder="Enter building description"
                                            wire:model="{{ $building->description }}" />

                                        <div class="flex">
                                            <flux:spacer />

                                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                                        </div>
                                    </div>
                                </flux:modal>

                                <flux:button icon="trash" variant="danger" wire:click="delete({{ $building->id }})" />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No buildings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>