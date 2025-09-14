<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        $images = json_decode($this->image, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($images)) {
            $small = ! empty($images['small']) ? asset('storage/' . $images['small']) : null;
        } else {

            $small = $this->image ? asset('storage/' . $this->image) : null;
        }

        return [
            'id'    => $this->id,
            'title' => $this->title,
            'slug'  => $this->slug,
            'image' => $small,
            'date'  => $this->date ?? $this->created_at->toDateString(),
            'views' => $this->views ?? 0,
        ];
    }
}
