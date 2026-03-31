<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PostCategoryController extends Controller
{
    protected $viewPath = 'admin.post_categories';
    protected $routePath = 'post-categories';
    protected $title = 'Post Categories';
    protected $singular = 'Post Category';
    protected $plural = 'Post Categories';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = PostCategory::orderBy('created_at', 'desc')->get();

        // return view('admin.post_categories.index', compact('records'));
        return view("{$this->viewPath}.index", [
            'records'   => $records,
            'title'     => "All {$this->plural}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title'     => "Add {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $slug = Str::slug($request->name);

    $originalSlug = $slug;
    $count = 1;

    while (PostCategory::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    $imagePath = '';

    if ($request->hasFile('image')) {
        $image    = $request->file('image');
        $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

        $manager = new ImageManager(new Driver());

        $large = $manager->read($image)->cover(1440, 400);

        $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
        $large->place($overlay, 'center');

        $largePath = 'uploads/post_categories/large_' . $filename;
        $large->save(storage_path('app/public/' . $largePath));

        $imagePath = $largePath;
    }

    PostCategory::create([
        'name' => $request->name,
        'excerpt' => $request->excerpt,
        'slug' => $slug,
        'meta_keywords' => $request->meta_keywords,
        'meta_description' => $request->meta_description,
        'meta_title' => $request->meta_title,
        'image' => $imagePath,
        'image_alt' => $request->image_alt,
        'image_title' => $request->image_title,
    ]);

    return redirect()->route("{$this->routePath}.index")
        ->with('success', "{$this->singular} Created!");
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {


        return view("{$this->viewPath}.edit", [
            'record'    => $postCategory,
            'title'     => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->update($request->all());

    //     return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    // }
    public function update(Request $request, PostCategory $postCategory)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $slug = Str::slug($request->name);

    // Only regenerate slug if name changed
    if ($postCategory->name !== $request->name) {

        $originalSlug = $slug;
        $count = 1;

        while (
            PostCategory::where('slug', $slug)
                ->where('id', '!=', $postCategory->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

    } else {
        $slug = $postCategory->slug; // keep old slug
    }

    $postCategory->update([
        'name' => $request->name,
        'slug' => $slug,
        'excerpt' => $request->excerpt,
        'meta_keywords' => $request->meta_keywords,
        'meta_description' => $request->meta_description,
        'meta_title' => $request->meta_title,
    ]);

    return redirect()->route("{$this->routePath}.index")
        ->with('success', "{$this->singular} Updated!");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Deleted!");
    }
}
