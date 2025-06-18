<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Resources\SettingResource;

class SettingController extends Controller
{
    public function index()
        {
            $settings = Setting::all();
            $keyed = $settings->pluck('val', 'key');

            return response()->json($keyed);
        }
}



