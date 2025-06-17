<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{

    public function index()
    {
        return TeamResource::collection(Team::latest()->get());
    }

}
