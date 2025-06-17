<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bait extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'father_name',
    'bait_date',
    'image',
    'cnic',
    'city_permanent',
    'city_temp',
    'phone_permanent',
    'phone_temporary',
    'country',
    'province',
    'reference',
];

}
