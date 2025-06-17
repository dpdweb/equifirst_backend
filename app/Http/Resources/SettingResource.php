<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'val' => $this->{$this->key}, // Use dynamic property based on 'key'
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
