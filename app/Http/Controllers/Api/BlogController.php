<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $blogs = Post::orderBy('created_at', 'desc')->where('status', 'publish')->get();

        return BlogResource::collection($blogs);
    }

    public function show(string $slug): JsonResponse
    {

        $post = Post::with('author')->where('slug', $slug)->where('status', 'publish')->firstOrFail();

        $imageUrl = $this->resolveImageUrl($post->image);

        $authorData = null;

        $faqs = $post->faqs->map(function ($faq) {
            return [
                'id'       => $faq->id,
                'question' => $faq->question,
                'answer'   => $faq->answer,
            ];
        });

        $tags = $post->tags->map(function ($tag) {
            return [
                'id'   => $tag->id,
                'name' => $tag->name,
            ];
        });


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
            'image_alt' => $post->image_alt,
            'image_title' => $post->image_title,
            'meta_keywords' => $post->meta_keywords,
            'meta_description' => $post->meta_description,
            'meta_title' => $post->meta_title,
            'date'    => $post->created_at->toDateString(),
            'views'   => $post->views,
            'content' => $post->content,
            'author'  => $authorData,
            'faqs'    => $faqs,
            'tags'    => $tags,
        ]);
    }

    public function incrementView(string $slug): JsonResponse
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $post->views = ($post->views ?? 0) + 1;
        $post->save();

        return response()->json(['success' => true, 'views' => $post->views]);
}

    private function resolveImageUrl(?string $image): ?string
    {
        if (!$image) {
            return null;
        }

        $decoded = json_decode($image, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return !empty($decoded['large']) ? asset('storage/' . $decoded['large']) : null;
        }

        return asset('storage/' . $image);
    }
}
