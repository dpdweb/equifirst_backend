<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroSliderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\FaqCategoryApiController;
use App\Http\Controllers\Api\FaqApiController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\TestimonialController;



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


Route::get('/hero-sliders', [HeroSliderController::class, 'index']);
Route::get('/teams', [TeamController::class, 'index']);

Route::get('/categories', [FaqCategoryApiController::class, 'index']);
Route::get('/faqs', [FaqApiController::class, 'index']);
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);


Route::get('/settings', [SettingController::class, 'index']);
