<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'image',
        'description',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

}
