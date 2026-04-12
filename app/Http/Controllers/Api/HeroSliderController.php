<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeroSliderResource;
use App\Models\HeroSlider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HeroSliderController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HeroSliderResource::collection(HeroSlider::latest()->get());
    }


}
