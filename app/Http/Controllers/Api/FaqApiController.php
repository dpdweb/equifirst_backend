<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqApiController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:faq_categories,id',
            'page'     => 'sometimes|integer|min:1'
        ]);

        $categoryId = $request->input('category');
        $perPage = 20;

        $faqs = Faq::where('faq_category_id', $categoryId)
                    ->select('id', 'question', 'answer')
                    ->orderBy('id', 'asc')
                    ->paginate($perPage);

        return response()->json($faqs);
    }
}
