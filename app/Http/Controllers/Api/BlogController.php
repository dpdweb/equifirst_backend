<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\Post;
// use Illuminate\Http\Request;

// class BlogController extends Controller
// {
//     public function index(Request $request)
//     {
//         $request->validate([
//             'page' => 'sometimes|integer|min:1',
//         ]);

//         $perPage = 6;

//         $blogs = Post::orderBy('created_at', 'desc')
//                     ->paginate($perPage);

//         // $blogs = Post::select('id', 'title', 'image', 'date', 'views')
//         //             ->orderBy('date', 'desc')
//         //             ->paginate($perPage);

//         return response()->json($blogs);
//     }
// }

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

        return response()->json([
            'id'      => $post->id,
            'title'   => $post->title,
            'slug'    => $post->slug,
            'image'   => asset('storage/' . $post->image),
            'date'    => $post->created_at->toDateString(),
            'views'   => $post->views,
            'content' => $post->content,
            'author'  => [
                'id'          => $post->author->id,
                'name'        => $post->author->name,
                'email'       => $post->author->email,
                'image'       => asset('storage/' . $post->author->image),
                'role'        => $post->author->role,
                // 'phone' => $post->author->phone,
                'description' => $post->author->description,
                // Add more author fields as needed
            ],
        ]);
    }

    // App\Http\Controllers\BlogController.php
    public function incrementView($slug)
    {
        $blog        = Post::where('slug', $slug)->firstOrFail();
        $blog->views = $blog->views + 1;
        $blog->save();

        return response()->json(['success' => true, 'views' => $blog->views]);
    }

}
