<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Item Details</h2>
    </x-slot>

    <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow">
            <p><strong>Name:</strong> {{ $item->item_name }}</p>
            <p><strong>Type:</strong> {{ $item->type }}</p>
            <p><strong>Description:</strong> {{ $item->description ?? 'N/A' }}</p>
            <p><strong>Category:</strong> {{ $item->category->category_name ?? '-' }}</p>
            <p><strong>Location:</strong> {{ $item->location->location_name ?? '-' }}</p>
            <p><strong>Status:</strong> {{ $item->status }}</p>
            <p><strong>Reported At:</strong> {{ $item->reported_at }}</p>
            @if($item->user_id == Auth::id())
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-2">Item ID</th>
                        <th class="p-2">Claimer ID</th>
                        <th class="p-2">Claim Date</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->claims as $claim)
                    <tr class="border-b">
                        <td class="p-2"> {{ $claim->item_id }}</td>
                        <td class="p-2"> {{ $claim->claimer_id }}</td>
                        <td class="p-2"> {{ $claim->claim_date }}</td>
                        <td class="p-2"> {{ $claim->status }}</td>
                        <td class="p-2">
                            <form action="{{ route('items.reject', $claim) }}" method="GET" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600" onclick="return confirm('Reject this claim?')">Reject</button>
                            </form>
                            <form action="{{ route('items.approve', $claim) }}" method="GET" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600" onclick="return confirm('Accept this claim?')">accept</button>
                            </form>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            @endif

            <div class="mt-4">
                <a href="{{ route('items.edit', $item) }}" class="px-3 py-1 bg-yellow-500 rounded">Edit</a>
                <a href="{{ route('items.index') }}" class="ml-2 text-gray-600">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
