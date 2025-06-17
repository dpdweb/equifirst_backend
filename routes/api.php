<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroSliderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TeamController;

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

Route::get('/settings', [SettingController::class, 'index']);
