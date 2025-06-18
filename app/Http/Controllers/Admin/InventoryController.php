<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        $records = Inventory::with(['category', 'organization'])->get();
        return view('admin.inventories.index', compact('records'));
    }

    public function create()
    {
        $categories = Category::all();
        $organizations = Organization::all();
        return view('admin.inventories.create', compact('categories', 'organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'quantity'        => 'required|integer|min:0',
            'notes'           => 'nullable|string',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        Inventory::create([
            'category_id'     => $validated['category_id'],
            'name'            => $validated['name'],
            'quantity'        => $validated['quantity'],
            'notes'           => $validated['notes'] ?? null,
            'organization_id' => $validated['organization_id'],
            'user_id'         => Auth::id(), // current logged-in user
        ]);

        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully.');
    }

    public function edit($id)
    {
        $record = Inventory::findOrFail($id);
        $categories = Category::all();
        $organizations = Organization::all();
        return view('admin.inventories.edit', compact('record', 'categories', 'organizations'));
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'quantity'        => 'required|integer|min:0',
            'notes'           => 'nullable|string',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        $inventory->update([
            'category_id'     => $validated['category_id'],
            'name'            => $validated['name'],
            'quantity'        => $validated['quantity'],
            'notes'           => $validated['notes'] ?? null,
            'organization_id' => $validated['organization_id'],
            'user_id'         => Auth::id(), // always track updater
        ]);

        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }


}

