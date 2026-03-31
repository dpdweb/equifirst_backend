<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
    protected $fillable = ['name', 'slug', 'excerpt',  'meta_keywords', 'meta_description', 'meta_title', 'image', 'image_title', 'image_alt'];

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_category_relations',
            'category_id',
            'post_id'
        );
    }
}

