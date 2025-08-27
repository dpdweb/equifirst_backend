<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'page' => 'sometimes|integer|min:1',
        ]);

        $blogs = Post::orderBy('created_at', 'desc')->get();

        return BlogResource::collection($blogs);
    }

public function show($slug)
{
    $post = Post::with('author')->where('slug', $slug)->first();

    if (! $post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    $imageUrl = asset('storage/' . $post->image);

    $authorData = null;
    if ($post->author) {
        $authorData = [
            'id'          => $post->author->id,
            'name'        => $post->author->name,
            'email'       => $post->author->email,
            'image'       => $post->author->image ? asset('storage/' . $post->author->image) : null,
            'role'        => $post->author->role,
            'description' => $post->author->description,
        ];
    }

    return response()->json([
        'id'      => $post->id,
        'title'   => $post->title,
        'slug'    => $post->slug,
        'image'   => $imageUrl,
        'date'    => $post->created_at->toDateString(),
        'views'   => $post->views,
        'content' => $post->content,
        'author'  => $authorData, // null if no author
    ]);
}


    public function incrementView($slug)
    {
        $blog        = Post::where('slug', $slug)->firstOrFail();
        $blog->views = $blog->views + 1;
        $blog->save();

        return response()->json(['success' => true, 'views' => $blog->views]);
    }
}
