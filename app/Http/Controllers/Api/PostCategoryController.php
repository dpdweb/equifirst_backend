<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PostCategoryResource;
use App\Models\Post;
use App\Http\Resources\BlogResource;
use Illuminate\Http\JsonResponse;



class PostCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = PostCategory::orderBy('name', 'asc')->get();

        return PostCategoryResource::collection($categories);
    }

    public function posts(string $slug): JsonResponse
    {
        $category = PostCategory::with('posts')->where('slug', $slug)->firstOrFail();

        return response()->json([
            'category' => new PostCategoryResource($category),
            'posts'    => BlogResource::collection($category->posts),
        ]);
}

}
