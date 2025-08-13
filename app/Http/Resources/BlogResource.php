<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'slug'     => $this->slug,
            'image'     => asset('storage/' . $this->image),
            'date'      => $this->date ?? $this->created_at->toDateString(),
            'views'     => $this->views ?? 0,
        ];
    }
}
