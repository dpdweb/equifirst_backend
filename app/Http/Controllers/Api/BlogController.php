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
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'page' => 'sometimes|integer|min:1',
        ]);

        $perPage = 6;

        $blogs = Post::orderBy('created_at', 'desc')
                    ->paginate($perPage);

        return BlogResource::collection($blogs);
    }
}

