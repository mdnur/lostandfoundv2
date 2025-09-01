<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Claim Item: {{ $item->item_name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('claims.store', $item) }}">
                    @csrf



                    <div class="flex justify-end">
                        <x-button class="bg-indigo-600 hover:bg-indigo-700">
                            Submit Claim
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
