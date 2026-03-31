<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Post;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $viewPath = 'admin.faqs';
    protected $routePath = 'faqs';
    protected $title = 'FAQs';
    protected $singular = 'FAQ';
    protected $plural = 'FAQs';

    public function index()
    {
        $records = Faq::with('category')->latest()->get();
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
        $categories = FaqCategory::all();

        $posts = Post::all();

        return view("{$this->viewPath}.create", [
            'categories' => $categories,
            'posts'        => $posts,
            'title'      => "Add {$this->singular}",
            'routePath'  => $this->routePath,
            'singular'   => $this->singular,
            'plural'     => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|max:255',
            'answer'          => 'required|string',
        ]);

        Faq::create($request->only(['faq_category_id', 'question', 'answer']));

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Created!");
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view("{$this->viewPath}.edit", [
            'record'     => $faq,
            'categories' => $categories,
            'title'      => "Edit {$this->singular}",
            'routePath'  => $this->routePath,
            'singular'   => $this->singular,
            'plural'     => $this->plural,
        ]);
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|max:255',
            'answer'          => 'required|string',
        ]);

        $faq->update($request->only(['faq_category_id', 'question', 'answer']));

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Updated!");
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Deleted!");
    }
}
