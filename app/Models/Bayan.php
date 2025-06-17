<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayan extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'name_urdu',
        'description',
        'description_urdu',
        'thumbnail',
        'video_link',
        'video_duration',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(BayanCategory::class, 'category_id');
    }

}

