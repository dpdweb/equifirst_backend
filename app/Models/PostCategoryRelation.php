<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategoryRelation extends Model
{
    protected $table = 'post_category_relations';

    protected $fillable = ['post_id', 'category_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}


