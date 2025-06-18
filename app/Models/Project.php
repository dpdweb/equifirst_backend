<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'description',
    'address',
    'start_date',
    'islamic_date',
    'project_type',
    'project_image',
    'language',
];
}
