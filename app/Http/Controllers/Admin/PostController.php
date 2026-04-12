<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Team;
use App\Models\PostTag;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    protected $viewPath  = 'admin.posts';
    protected $routePath = 'posts';
    protected $title     = 'Posts';
    protected $singular  = "Post";
    protected $plural    = "Posts";

    public function index()
    {
        $records = Post::orderBy('created_at', 'desc')->get();

        return view("{$this->viewPath}.index", [
            'records' => $records,
            'title'   => "{$this->title}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => "All {$this->plural}",
        ]);
    }

    public function create()
    {
        $teams = Team::all();

        $faqs = Faq::orderBy('created_at', 'desc')->get();

        $tags = PostTag::all();

        $categories = PostCategory::all();


        return view("{$this->viewPath}.create", [
            'teams' => $teams,
            'faqs' => $faqs,
            'tags'  => $tags,
            'categories' => $categories,
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
        'excerpt' => 'required|string|max:255',
        'content' => 'required|string',

        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image_title' => 'required|string|max:255',
        'image_alt' => 'required|string|max:255',

        'author_id' => 'required|exists:teams,id',

        'meta_title' => 'nullable|string|max:60',
        'meta_description' => 'nullable|string|max:160',
        'meta_keywords' => 'nullable|string',

        'faq_ids' => 'nullable|array',
        'faq_ids.*' => 'exists:faqs,id',

        'tag_names' => 'nullable|array',
        'tag_names.*' => 'string|max:50',
    ]);

        $faq_ids = $request->faq_ids ?? [];
        $faq_ids = json_encode($faq_ids);


        $slug         = Str::slug($request->title);
        $originalSlug = $slug;
        $counter      = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = '';

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());

            $small     = $manager->read($image)->scale(430, null);
            $smallPath = 'uploads/posts/small_' . $filename;
            $small->save(storage_path('app/public/' . $smallPath));

            $large = $manager->read($image)->cover(1440, 400);

            $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
            $large->place($overlay, 'center');

            $largePath = 'uploads/posts/large_' . $filename;
            $large->save(storage_path('app/public/' . $largePath));

            $imagePath = json_encode([
                'small' => $smallPath,
                'large' => $largePath,
            ]);
        }

        $post = Post::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'excerpt'   => $request->excerpt,
            'content'   => $request->content,
            'image'     => $imagePath,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'author_id' => $request->author_id,
            'status'    => 'draft',
        ]);


        if ($request->has('tag_ids')) {
            $post->tags()->sync($request->tag_ids);
        }

        if ($request->has('category_ids')) {
            $post->categories()->sync($request->category_ids);
        }

        if ($request->has('faq_ids')) {
            $post->faqs()->sync($request->faq_ids);
        }

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} created successfully.");
    }

    public function edit(string $id)
    {
        $record = Post::findOrFail($id);
        $teams  = Team::all();

                $faqs = Faq::orderBy('created_at', 'desc')->get();

        $tags = PostTag::all();

        $categories = PostCategory::all();

        // $selected_tags = $record->meta()->where('meta_key', 'tag')->pluck('meta_value')->toArray();

        return view("{$this->viewPath}.edit", [
            'record' => $record,
            'teams'  => $teams,
            'faqs' => $faqs,
            'tags'  => $tags,
            'categories' => $categories,
            // 'selected_tags' => $selected_tags,
            'title'  => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_title' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',

            'author_id' => 'required|exists:teams,id',

            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',

            'faq_ids' => 'nullable|array',
            'faq_ids.*' => 'exists:faqs,id',

            'tag_names' => 'nullable|array',
            'tag_names.*' => 'string|max:50',
        ]);

        $faq_ids = $request->faq_ids ?? [];

        $faq_ids = json_encode($faq_ids);

        $tag_ids = $request->tag_ids ?? [];

        $tag_ids = json_encode($tag_ids);


        // Generate or preserve slug
        $slug = $post->slug;

        if (empty($slug) || $post->title !== $request->title) {
            $baseSlug = Str::slug($request->title);
            $slug     = $baseSlug;
            $counter  = 1;

            while (
                Post::where('slug', $slug)
                ->where('id', '!=', $post->id) // exclude current post
                ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
        }

// Handle image update
        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            // --- Delete old images ---
            if ($post->image) {
                $oldImages = json_decode($post->image, true);
                if (! empty($oldImages['small']) && Storage::disk('public')->exists($oldImages['small'])) {
                    Storage::disk('public')->delete($oldImages['small']);
                }
                if (! empty($oldImages['large']) && Storage::disk('public')->exists($oldImages['large'])) {
                    Storage::disk('public')->delete($oldImages['large']);
                }
            }

            $image    = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

            // Create manager with GD driver
            $manager = new ImageManager(new Driver());

            // Small version (resize to width=430, keep ratio)
            $small     = $manager->read($image)->scale(430, null);
            $smallPath = 'uploads/posts/small_' . $filename;
            $small->save(storage_path('app/public/' . $smallPath));

            // Large version (1440x400 with dark overlay)
            $large   = $manager->read($image)->cover(1440, 400);
            $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
            $large->place($overlay, 'center');

            $largePath = 'uploads/posts/large_' . $filename;
            $large->save(storage_path('app/public/' . $largePath));

            // Store JSON with new paths
            $imagePath = json_encode([
                'small' => $smallPath,
                'large' => $largePath,
            ]);
        }


        $post->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'excerpt'   => $request->excerpt,
            'content'   => $request->content,
            'image'     => $imagePath,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'author_id' => $request->author_id,
            'status'    => $request->status,
        ]);


        if ($request->has('tag_ids')) {
            $post->tags()->sync($request->tag_ids);
        }

        if ($request->has('category_ids')) {
            $post->categories()->sync($request->category_ids);
        }

        if ($request->has('faq_ids')) {
            $post->faqs()->sync($request->faq_ids);
        }

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} updated successfully.");
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // $post->meta()->delete();

        if ($post->image) {
            $images = json_decode($post->image, true);

            if (! empty($images['small']) && Storage::disk('public')->exists($images['small'])) {
                Storage::disk('public')->delete($images['small']);
            }

            if (! empty($images['large']) && Storage::disk('public')->exists($images['large'])) {
                Storage::disk('public')->delete($images['large']);
            }
        }

        $post->delete();

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} deleted successfully.");
    }

}
