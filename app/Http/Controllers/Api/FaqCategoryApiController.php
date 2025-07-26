<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;

class FaqCategoryApiController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::select('id', 'name')->orderBy('name')->get();
        return response()->json($categories);
    }
}
