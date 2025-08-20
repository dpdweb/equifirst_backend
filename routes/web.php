<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;

// Check environment
$prefix = app()->environment('production') ? 'admin' : '';

// Redirect root to login page
Route::redirect('/', "/$prefix/login");

// Auth routes with conditional prefix
Route::prefix($prefix)->group(function () {
    Auth::routes(['register' => false]);

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('hero-slides', HeroSliderController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('faq-categories', FaqCategoryController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('testimonials', TestimonialController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/site-setting', [SettingController::class, 'site_setting'])->name('view.site-setting');
        Route::get('/social-media-setting', [SettingController::class, 'social_media_setting'])->name('view.social-media-setting');
        Route::resource('/settings', SettingController::class);
    });
});


