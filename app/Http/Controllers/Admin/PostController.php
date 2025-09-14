<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Team;
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
        $records = Post::orderBy('created_at', 'asc')->get();

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

        return view("{$this->viewPath}.create", [
            'teams' => $teams,
            'title' => "Create {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            'author_id' => 'nullable|exists:teams,id',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Generate unique slug
        $slug         = Str::slug($request->title);
        $originalSlug = $slug;
        $counter      = 1;

        // Ensure the slug is unique
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = '';
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();

            // Create manager with GD driver
            $manager = new ImageManager(new Driver());

            // -------------------
            // Small version (resize to width=430, keep ratio)
            // -------------------
            $small     = $manager->read($image)->scale(430, null);
            $smallPath = 'uploads/posts/small_' . $filename;
            $small->save(storage_path('app/public/' . $smallPath));

            // -------------------
            // Large version (1440x400 with dark overlay)
            // -------------------
            $large = $manager->read($image)->cover(1440, 400);

            // Add dark overlay (semi-transparent black)
            $overlay = $manager->create(1440, 400)->fill('rgba(0,0,0,0.5)');
            $large->place($overlay, 'center');

            $largePath = 'uploads/posts/large_' . $filename;
            $large->save(storage_path('app/public/' . $largePath));

            // Store JSON with paths
            $imagePath = json_encode([
                'small' => $smallPath,
                'large' => $largePath,
            ]);
        }

        Post::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'content'   => $request->content,
            'image'     => $imagePath,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} created successfully.");
    }

    public function edit(string $id)
    {
        $record = Post::findOrFail($id);
        $teams  = Team::all();

        return view("{$this->viewPath}.edit", [
            'record' => $record,
            'teams'  => $teams,
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
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'author_id' => 'nullable|exists:teams,id',
        ]);

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

// Update post
        $post->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'content'   => $request->content,
            'image'     => $imagePath, // ✅ now using the new JSON (or old if no new file)
            'author_id' => $request->author_id,
        ]);

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} updated successfully.");
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

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
