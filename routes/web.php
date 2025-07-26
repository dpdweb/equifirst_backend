<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{ HeroSliderController, DashboardController, TeamController, CategoryController, PostController, SettingController, ProfileController, FaqCategoryController, FaqController, TestimonialController   };
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


// Route::group(['middleware' => ['auth', 'role:admin']], function () {

//     Route::resource('hero-sliders', HeroSliderController::class);
//     Route::resource('hero-sliders', HeroSliderController::class);

// });\


Route::group(['middleware' => 'auth'], function () {

    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::resource('hero-slides', HeroSliderController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('testimonials', TestimonialController::class);



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route::get('/site-setting',[SettingController::class,'sitesetting'])->name('view.sitesetting');
    // Route::put('settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
    // Route::put('settings', [SettingController::class, 'updateAll'])->name('settings.update');

    // Route::resource('/settings', SettingController::class);

    Route::get('/site-setting', [SettingController::class, 'site_setting'])->name('view.site-setting');
    Route::get('/social-media-setting', [SettingController::class, 'social_media_setting'])->name('view.social-media-setting');


    Route::resource('/settings', SettingController::class);


});
