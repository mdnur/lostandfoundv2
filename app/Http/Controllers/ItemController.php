<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Claim;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'location', 'claims'])
            ->latest()
            ->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('items.create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Lost,Found',
            'item_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
        ]);

        Item::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'item_name' => $request->item_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'status' => 'Active',
            'reported_at' => now(),
        ]);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {

        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('items.edit', compact('item', 'categories', 'locations'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'type' => 'required|in:Lost,Found',
            'item_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|in:Active,Resolved',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }

    public function claim(Item $item)
    {
        // dd($item);
        Claim::create([
            'item_id' => $item->id,
            'claimer_id' => Auth::id(),
            'claim_date' => now(),
            'status' => 'Pending',
        ]);

        return redirect()->route('items.index')->with('success', 'Item inserted successfully.');
    }

    public function my_items()
    {
        $items = Item::where('user_id', Auth::id())
            ->with(['category', 'location', 'claims'])
            ->latest()
            ->paginate(10);

        return view('items.my_items', compact('items'));
    }

    public function approve(Claim $claim)
    {
        // Update the claim status to 'Approved'
        $claim->update(['status' => 'Approved']);

        // Update the associated item's status to 'Resolved'
        $claim->item->update(['status' => 'Resolved']);

        return redirect()->route('items.my_items')->with('success', 'Claim approved and item marked as resolved.');
    }

    public function reject(Claim $claim)
    {
        // Update the claim status to 'Rejected'
        $claim->update(['status' => 'Rejected']);

        return redirect()->route('items.my_items')->with('success', 'Claim rejected successfully.');
    }
}
