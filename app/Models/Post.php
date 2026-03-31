<?php
namespace App\Models;

use App\Models\Category;
use App\Models\PostMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'excerpt', 'content', 'image', 'slug', 'author_id', 'views', 'meta_keywords', 'meta_description', 'meta_title', 'image_alt', 'image_title', 'faq_ids',  'status'];

    public function categories()
    {
        return $this->belongsToMany(
            PostCategory::class,
            'post_category_relations',
            'post_id',
            'category_id'
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            PostTag::class,
            'post_tags_relations', // pivot
            'post_id',
            'tag_id'
        );
    }

    public function faqs()
    {
        return $this->belongsToMany(
            Faq::class,
            'post_faqs_relations',
            'post_id',
            'faq_id'
        );
    }

    public function author()
    {
        return $this->belongsTo(Team::class, 'author_id');
    }

    public function meta()
    {
        return $this->hasMany(PostMeta::class);
    }


    public function getMeta($key)
    {
        return optional($this->meta->where('meta_key', $key)->first())->meta_value;
    }

}
