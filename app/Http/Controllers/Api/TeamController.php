<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function list (): array
    {
        //return TeamResource::collection(Team::paginate(20))->resolve();
        return [];
    }
}
