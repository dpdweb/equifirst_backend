<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
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

        return view("{$this->viewPath}.create", [
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
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = '';

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $filename  = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/posts', $filename, 'public');
        }

        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} created successfully.");
    }

    public function edit(string $id)
    {
        $record = Post::findOrFail($id);

        return view("{$this->viewPath}.edit", [
            'record'    => $record,
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
        ]);

        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $image     = $request->file('image');
            $filename  = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/posts', $filename, 'public');
        }

        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} updated successfully.");
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
