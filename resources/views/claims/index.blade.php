<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Claims
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if($claims->count())
            <div class="space-y-4">
                @foreach ($claims as $claim)
                <div class="bg-white shadow sm:rounded-lg p-4 flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold">
                            {{ $claim->item->item_name }} ({{ $claim->item->type }})
                        </h3>
                        <p class="text-gray-600 mt-1">{{ $claim->message }}</p>
                        <p class="text-sm mt-2">
                            <strong>Status:</strong>
                            <span class="px-2 py-1 rounded text-white
                                        @if($claim->status === 'pending') bg-yellow-500
                                        @elseif($claim->status === 'approved') bg-green-600
                                        @else bg-red-600 @endif">
                                {{ ucfirst($claim->status) }}
                            </span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $claims->links() }}
            </div>
            @else
            <p class="text-gray-600">You haven’t submitted any claims yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>
