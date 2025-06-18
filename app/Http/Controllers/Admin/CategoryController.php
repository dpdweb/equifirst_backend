<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BayanCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $records = Category::all();

        return view('admin.categories.index', compact('records'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
            Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $record = Category::findOrFail($id);

        return view('admin.categories.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(string $id)
    {
        $record = Category::findOrFail($id);

        $record->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
