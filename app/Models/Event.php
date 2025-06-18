<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'start_date',
        'islamic_date',
        'image',
        'language',
    ];
}
