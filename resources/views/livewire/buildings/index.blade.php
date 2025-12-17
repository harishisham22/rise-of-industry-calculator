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
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Type</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @forelse ($buildings as $building)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ strtoupper($building->name) }}</td>
                        <td class="px-6 py-4">{{ $building->description ?? '-' }}</td>
                        <td class="px-6 py-4">{{ strtoupper($building->buildingType->name) }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('buildings.edit', $building) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No buildings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $buildings->links() }}
    </div>
</div>