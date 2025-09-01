<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Items
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <a href="{{ route('items.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded">+ Add Item</a>

        @if (session('success'))
        <div class="p-2 mt-4 text-green-800 bg-green-200 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div class="p-4 mt-6 bg-white rounded-lg shadow">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-2">Name</th>
                        <th class="p-2">Category</th>
                        <th class="p-2">Location</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="border-b">
                        <td class="p-2">{{ $item->item_name }}</td>
                        <td class="p-2">{{ $item->category->category_name ?? '-' }}</td>
                        <td class="p-2">{{ $item->location->location_name ?? '-' }}</td>
                        <td class="p-2">{{ $item->status }}</td>
                        <td class="p-2">
                            @php
                            $claimed = false;
                            @endphp

                            @foreach ($item->claims as $claim)

                            @if($claim->claimer_id == Auth::id())
                            @php
                            $claimed = true;
                            @endphp
                            @endif
                            @endforeach

                            @if($claimed == false)
                            <a href="{{ route('items.claim', $item) }}" class="text-blue-600">Claim</a> |
                            @else
                            <span class="text-green -600">Claimed |</span>
                            @endif
                            <a href="{{ route('items.show', $item) }}" class="text-blue-600">View</a> |
                            <a href="{{ route('items.edit', $item) }}" class="text-yellow-600">Edit</a> |
                            <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">{{ $items->links() }}</div>
        </div>
    </div>
</x-app-layout>
