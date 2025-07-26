<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $records = Page::latest()->get();
        return view('admin.page.index', compact('records'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pages,name',
        ]);

        // Auto-generate slug (optional)
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Page::create($data);

        return redirect()->route('pages.index')->with('success', 'Page created');
    }

    public function edit(Page $page)
    {
        $record = $page;
        return view('admin.page.edit', compact('record'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|unique:pages,name,' . $page->id,
        ]);

        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $page->update($data);

        return redirect()->route('pages.index')->with('success', 'Page updated');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted');
    }
}

