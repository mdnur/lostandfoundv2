@extends('layouts.app')

@section('content')
<h1>{{ $item->item_name }} ({{ $item->type }})</h1>
<p>{{ $item->description }}</p>

<p><strong>Category:</strong> {{ $item->category->category_name ?? 'N/A' }}</p>
<p><strong>Location:</strong> {{ $item->location->location_name ?? 'N/A' }}</p>
<p><strong>Status:</strong> {{ $item->status }}</p>
<p><strong>Reported By:</strong> {{ $item->user->name }}</p>

<a href="{{ route('items.index') }}" class="btn btn-primary mt-3">Back to Items</a>
@endsection
