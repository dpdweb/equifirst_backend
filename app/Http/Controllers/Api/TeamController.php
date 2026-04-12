<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Team;

class TeamController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return TeamResource::collection(
            Team::orderBy('sort_id', 'asc')->get()
        );
    }

}
