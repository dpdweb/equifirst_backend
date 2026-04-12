<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageController extends Controller
{

    public function show(string $slug): JsonResponse
        {

            $page = Page::where('slug', $slug)
                ->where('status', 'publish')
                ->first();


            if (!$page) {
                $page = Page::where('slug', 'home')
                    ->where('status', 'publish')
                    ->firstOrFail();
            }

            $imageUrl = $this->resolveImageUrl($page->hero_image);

            return response()->json([
                'id'    => $page->id,
                'title' => $page->title,
                'slug'  => $page->slug,
                'date'  => $page->created_at->toDateString(),
                'content' => $page->content,

                'image' => [
                    'url'   => $imageUrl,
                    'alt'   => $page->hero_image_alt ?? '',
                    'title' => $page->hero_image_title ?? '',
                ],

                'meta' => [
                    'title'       => $page->meta_title ?? '',
                    'description' => $page->meta_description ?? '',
                    'keywords'    => $page->meta_keywords ?? '',
                ],
            ]);
        }


    private function resolveImageUrl(?string $image): ?string
    {
        if (!$image) {
            return null;
        }

        $decoded = json_decode($image, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return !empty($decoded['large'])
                ? asset('storage/pages/' . $decoded['large'])
                : null;
        }

        return asset('storage/' . $image);
    }
}
