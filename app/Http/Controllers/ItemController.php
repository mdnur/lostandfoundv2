<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // Show all items
    public function index()
    {
        $items = Item::with(['user', 'category', 'location'])->latest()->paginate(10);

        return view('items.index', compact('items'));
    }

    // Show single item
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('items.create', compact('categories', 'locations'));
    }

    // Store item
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:100',
            'type' => 'required|in:Lost,Found',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'location_id' => 'nullable|exists:locations,id',
        ]);

        Item::create([
            'user_id' => Auth::id(),
            'item_name' => $request->item_name,
            'type' => $request->type,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('items.index')->with('success', 'Item reported successfully.');
    }
}
