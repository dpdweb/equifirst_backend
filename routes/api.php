<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroSliderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\FaqCategoryApiController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\PostCategoryController;
use App\Http\Controllers\Api\PageController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/teams', [TeamController::class, 'index']);

Route::get('/hero-sliders', [HeroSliderController::class, 'index']);

Route::get('/faq-categories', [FaqCategoryApiController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);

Route::get('/post-categories', [PostCategoryController::class, 'index']);
Route::get('/post-categories/{slug}/posts', [PostCategoryController::class, 'posts']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);
Route::post('/blogs/{slug}/increment-view', [BlogController::class, 'incrementView']);

Route::get('/pages/{slug}', [PageController::class, 'show']);

Route::get('/testimonials', [TestimonialController::class, 'index']);

Route::get('/settings', [SettingController::class, 'index']);
