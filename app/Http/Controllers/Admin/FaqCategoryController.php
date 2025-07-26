<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $viewPath = 'admin.faq_categories';
    protected $routePath = 'faq-categories';
    protected $title = 'FAQ Categories';
    protected $singular = 'FAQ Category';
    protected $plural = 'FAQ Categories';

    public function index()
    {
        $records = FaqCategory::latest()->get();
        return view("{$this->viewPath}.index", [
            'records'   => $records,
            'title'     => "All {$this->plural}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title'     => "Add {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Created!");
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view("{$this->viewPath}.edit", [
            'record'    => $faqCategory,
            'title'     => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);

    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Updated!");
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Deleted!");
    }
}
