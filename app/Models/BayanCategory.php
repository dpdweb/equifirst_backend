<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayanCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_urdu', 'description'];

    public function bayans()
    {
        return $this->hasMany(Bayan::class);
    }

}
