<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Artisan;

// Check environment
$prefix = app()->environment('production') ? 'admin' : 'admin';

// Redirect root to login page
Route::redirect('/', "/$prefix/login");

// Auth routes with conditional prefix
Route::prefix($prefix)->group(function () {
    Auth::routes(['register' => false]);

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('hero-slides', HeroSliderController::class);

        Route::get('teams/sort', [TeamController::class, 'sort'])->name('teams.sort');
        Route::post('teams/sort-save', [TeamController::class, 'sortSave'])->name('teams.sort-save');
        Route::resource('teams', TeamController::class);

        Route::resource('post-categories', PostCategoryController::class);
        Route::resource('posts', PostController::class);

        Route::resource('tags', TagController::class);

        Route::resource('pages', PageController::class);

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

Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('event:clear');

    return "Cache cleared successfully!";
});


