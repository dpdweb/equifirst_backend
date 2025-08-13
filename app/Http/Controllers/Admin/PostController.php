<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'records'   => $records,
            'title'     => "{$this->title}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => "All {$this->plural}",
        ]);
    }

    public function create()
    {
        $teams = Team::all();

        return view("{$this->viewPath}.create", [
            'teams'     => $teams,
            'title'     => "Create {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'nullable|exists:teams,id',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            $image     = $request->file('image');
            $filename  = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/posts', $filename, 'public');
        }

        Post::create([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'image'   => $imagePath,
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
            'record'    => $record,
            'teams'     => $teams,
            'title'     => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $image     = $request->file('image');
            $filename  = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/posts', $filename, 'public');
        }

        // Update post
        $post->update([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'image'   => $imagePath,
            'author_id' => $request->author_id,

        ]);

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} updated successfully.");
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} deleted successfully.");
    }
}
