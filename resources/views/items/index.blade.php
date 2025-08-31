@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lost & Found Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-success">+ Report Item</a>
</div>

@if($items->count())
@foreach ($items as $item)
<div class="card mb-3">
    <div class="card-body">
        <h5>{{ $item->item_name }} <small class="text-muted">({{ $item->type }})</small></h5>
        <p>{{ Str::limit($item->description, 100) }}</p>
        <p><strong>Category:</strong> {{ $item->category->category_name ?? 'N/A' }} |
            <strong>Location:</strong> {{ $item->location->location_name ?? 'N/A' }}</p>
        <a href="{{ route('items.show', $item) }}" class="btn btn-primary btn-sm">View</a>
    </div>
</div>
@endforeach

{{ $items->links() }}
@else
<p>No items reported yet.</p>
@endif
@endsection
