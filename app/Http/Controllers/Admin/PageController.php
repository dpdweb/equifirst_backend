<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PageController extends Controller
{
    protected $viewPath  = 'admin.pages';
    protected $routePath = 'pages';
    protected $title     = 'Pages';
    protected $singular  = "Page";
    protected $plural    = "Pages";

    public function index()
    {
        $records = Page::latest()->get();

        return view("{$this->viewPath}.index", [
            'records' => $records,
            'title'   => $this->title,
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => "All {$this->plural}",
        ]);
    }

    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title' => "Create {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|string|max:255',

            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',

            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'hero_image_title' => 'required|string|max:255',
            'hero_image_alt' => 'required|string|max:255',

        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Page::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $imagePath = null;

        if ($request->hasFile('hero_image')) {

            $image    = $request->file('hero_image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());

            // Create folder if not exists
            if (!Storage::exists('public/uploads/pages')) {
                Storage::makeDirectory('public/uploads/pages');
            }

            $large = $manager->read($image)->cover(1440, 400);

            $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
            $large->place($overlay, 'center');

            $largePath = 'uploads/pages/large_' . $filename;

            $large->save(storage_path('app/public/' . $largePath));

            $imagePath = $largePath;
        }


        Page::create([

            'title' => $request->title,
            'slug' => $slug,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

            'hero_title' => $request->hero_title,
            'hero_sub_title' => $request->hero_subtitle,

            'hero_image' => $imagePath,
            'hero_image_title' => $request->hero_image_title,
            'hero_image_alt' => $request->hero_image_alt,

        ]);

        return redirect()->route("{$this->routePath}.index")
            ->with('success',"{$this->singular} created successfully");

    }


    public function edit($id)
    {
        $record = Page::findOrFail($id);

        return view("{$this->viewPath}.edit",[
            'record'=>$record,
            'title'=>"Edit {$this->singular}",
            'routePath'=>$this->routePath,
            'singular'=>$this->singular,
            'plural'=>$this->plural,
        ]);
    }


public function update(Request $request, Page $page)
{

    $request->validate([

        'title' => 'required|string|max:255',

        'meta_title' => 'nullable|string|max:60',
        'meta_description' => 'nullable|string|max:160',
        'meta_keywords' => 'nullable|string|max:255',

        'hero_title' => 'required|string|max:255',
        'hero_subtitle' => 'required|string|max:255',

        'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

        'hero_image_title' => 'required|string|max:255',
        'hero_image_alt' => 'required|string|max:255',

    ]);

    /*
    |--------------------------------------------------------------------------
    | Generate Unique Slug
    |--------------------------------------------------------------------------
    */

    $slug = Str::slug($request->title);
    $originalSlug = $slug;
    $counter = 1;

    while (
        Page::where('slug', $slug)
            ->where('id', '!=', $page->id)
            ->exists()
    ) {
        $slug = $originalSlug . '-' . $counter++;
    }

    $imagePath = $page->hero_image;

    /*
    |--------------------------------------------------------------------------
    | Upload New Hero Image
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('hero_image')) {

        // delete old image
        if ($page->hero_image && Storage::exists('public/' . $page->hero_image)) {
            Storage::delete('public/' . $page->hero_image);
        }

        $image = $request->file('hero_image');
        $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

        $manager = new ImageManager(new Driver());

        if (!Storage::exists('public/uploads/pages')) {
            Storage::makeDirectory('public/uploads/pages');
        }

        $large = $manager->read($image)->cover(1440, 400);

        $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
        $large->place($overlay, 'center');

        $largePath = 'uploads/pages/large_' . $filename;

        $large->save(storage_path('app/public/' . $largePath));

        $imagePath = $largePath;
    }

    /*
    |--------------------------------------------------------------------------
    | Update Page
    |--------------------------------------------------------------------------
    */

    $page->update([

        'title' => $request->title,
        'slug' => $slug,

        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,

        'hero_title' => $request->hero_title,
        'hero_sub_title' => $request->hero_subtitle,

        'hero_image' => $imagePath,
        'hero_image_title' => $request->hero_image_title,
        'hero_image_alt' => $request->hero_image_alt,

    ]);

    return redirect()->route("{$this->routePath}.index")
        ->with('success', "{$this->singular} updated successfully");
}


    public function destroy($id)
    {

        $page = Page::findOrFail($id);

        if($page->image){

            $images = json_decode($page->image,true);

            if(!empty($images['small']) && Storage::disk('public')->exists($images['small'])){
                Storage::disk('public')->delete($images['small']);
            }

            if(!empty($images['large']) && Storage::disk('public')->exists($images['large'])){
                Storage::disk('public')->delete($images['large']);
            }

        }

        $page->delete();

        return redirect()->route("{$this->routePath}.index")
            ->with('success',"{$this->singular} deleted successfully");

    }

}
