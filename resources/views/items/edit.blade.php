<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Item</h2>
    </x-slot>

    <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow">
            <form action="{{ route('items.update', $item) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium">Type</label>
                    <select name="type" class="w-full p-2 border rounded">
                        <option value="Lost" {{ $item->type == 'Lost' ? 'selected' : '' }}>Lost</option>
                        <option value="Found" {{ $item->type == 'Found' ? 'selected' : '' }}>Found</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Item Name</label>
                    <input type="text" name="item_name" class="w-full p-2 border rounded" value="{{ $item->item_name }}">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" class="w-full p-2 border rounded">{{ $item->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full p-2 border rounded">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Location</label>
                    <select name="location_id" class="w-full p-2 border rounded">
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $item->location_id == $location->id ? 'selected' : '' }}>
                            {{ $location->location_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status" class="w-full p-2 border rounded">
                        <option value="Active" {{ $item->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Resolved" {{ $item->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-600 rounded">Update</button>
                <a href="{{ route('items.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
