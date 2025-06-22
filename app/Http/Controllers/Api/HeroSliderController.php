<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use App\Http\Resources\HeroSliderResource;

class HeroSliderController extends Controller
{
    public function index()
    {
        return HeroSliderResource::collection(HeroSlider::latest()->get());
    }

    public function show($id)
    {
        $slider = HeroSlider::find($id);
        if (!$slider) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        return new HeroSliderResource($slider);
    }
}

