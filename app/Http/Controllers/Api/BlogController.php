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

        $perPage = 12;

        $blogs = Post::orderBy('created_at', 'desc')
            ->paginate($perPage);

        return BlogResource::collection($blogs);
    }

    public function show($slug)
    {
        $post = Post::with('author')->where('slug', $slug)->first();

        if (! $post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Force HTTPS for the image URLs
        $imageUrl = str_replace('http://', 'https://', asset('storage/' . $post->image));
        $authorImageUrl = str_replace('http://', 'https://', asset('storage/' . $post->author->image));

        return response()->json([
            'id'      => $post->id,
            'title'   => $post->title,
            'slug'    => $post->slug,
            'image'   => $imageUrl,  // HTTPS URL for blog image
            'date'    => $post->created_at->toDateString(),
            'views'   => $post->views,
            'content' => $post->content,
            'author'  => [
                'id'          => $post->author->id,
                'name'        => $post->author->name,
                'email'       => $post->author->email,
                'image'       => $authorImageUrl,  // HTTPS URL for author image
                'role'        => $post->author->role,
                'description' => $post->author->description,
            ],
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
