<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Add New Item</h2>
    </x-slot>

    <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Type</label>
                    <select name="type" class="w-full p-2 border rounded">
                        <option value="Lost">Lost</option>
                        <option value="Found">Found</option>
                    </select>
                    @error('type') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Item Name</label>
                    <input type="text" name="item_name" class="w-full p-2 border rounded" required>
                    @error('item_name') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" class="w-full p-2 border rounded"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full p-2 border rounded">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Location</label>
                    <select name="location_id" class="w-full p-2 border rounded">
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                    @error('location_id') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="px-4 py-2 text-black bg-blue-600 rounded">Save</button>
                <a href="{{ route('items.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
