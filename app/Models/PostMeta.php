<?php
namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostMeta extends Model
{

    protected $table = 'posts_metas';

    protected $fillable = ['post_id', 'meta_key', 'meta_value'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
