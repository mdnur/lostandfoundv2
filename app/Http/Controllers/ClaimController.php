<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function create(Item $item)
    {
        return view('claims.create', compact('item'));
    }

    public function store(Request $request, Item $item)
    {
        $request->validate([
            'details' => 'required|string|max:1000',
        ]);

        Claim::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'details' => $request->details,
        ]);

        return redirect()->route('items.show', $item)
            ->with('success', 'Your claim has been submitted and is pending review.');
    }

    public function index()
    {
        // Admin or user dashboard
        $claims = Claim::with(['item', 'user'])->latest()->get();

        return view('claims.index', compact('claims'));
    }

    public function updateStatus(Request $request, Claim $claim)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $claim->update(['status' => $request->status]);

        return back()->with('success', 'Claim status updated.');
    }
}
