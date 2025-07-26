<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'link',
        'language',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}

