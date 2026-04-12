<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'slug'             => $this->slug,
            'excerpt'          => $this->excerpt,
            'meta_title'       => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords'    => $this->meta_keywords,
            'image'            => $this->image ? asset('storage/' . $this->image) : null,
            'image_title'      => $this->image_title,
            'image_alt'        => $this->image_alt,
            'created_at'       => $this->created_at?->toDateString(),
            'updated_at'       => $this->updated_at?->toDateString(),
        ];
    }
}
