@extends('layouts.app')

@section('content')
<h1>Report Lost or Found Item</h1>

<form method="POST" action="{{ route('items.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" name="item_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control" required>
            <option value="Lost">Lost</option>
            <option value="Found">Found</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Location</label>
        <select name="location_id" class="form-control">
            <option value="">-- Select Location --</option>
            @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Submit Report</button>
</form>
@endsection
