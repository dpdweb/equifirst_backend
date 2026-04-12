<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'hero_title',
        'hero_sub_title',
        'hero_image',
        'hero_image_title',
        'hero_image_alt',
        'link',
        'language',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',

    ];
}

