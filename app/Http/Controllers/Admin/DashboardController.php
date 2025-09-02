<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\FaqCategory;

class DashboardController extends Controller
{

    public function index()
    {

        $data = [
            'teams' => Team::count(),
            'posts' => Post::count(),
            'testimonials' => Testimonial::count(),
            'faqs' => Faq::count(),
            'faq_categories' => FaqCategory::count(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }

}
